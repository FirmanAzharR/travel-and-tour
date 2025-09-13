<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">List Booking Rental Mobil</h4>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="bookingCarTable" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Customer</th>
                                <th>No. WhatsApp</th>
                                <th>Tgl. Mulai</th>
                                <th>Tgl. Selesai</th>
                                <th>Mobil</th>
                                <th>Tipe Booking</th>
                                <th>Rute</th>
                                <th>Alamat Jemput</th>
                                <th>Durasi</th>
                                <th>Tgl. Booking</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded by DataTables -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Loading Indicator -->
                <div id="loading" class="text-center my-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p>Memuat data...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    // Hide loading indicator initially (in case JavaScript is enabled)
    $('#loading').hide();
    
    // Initialize DataTable with server-side processing
    var table = $('#bookingCarTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= site_url('booking/api_get_car_bookings_datatables') ?>",
            "type": "POST",
            "dataSrc": function(json) {
                // Hide loading indicator when data is loaded
                $('#loading').hide();
                return json.data;
            },
            "error": function(xhr, error, thrown) {
                // Hide loading indicator on error
                $('#loading').hide();
                console.error('Error loading data:', error);
            }
        },
        "initComplete": function(settings, json) {
            // Hide loading indicator when table is fully initialized
            $('#loading').hide();
        },
        "columns": [
            { 
                "data": null,
                "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                "orderable": false
            },
            { "data": "booking_code" },
            { "data": "customer_name" },
            { "data": "wa_number" },
            { 
                "data": "booking_date_start",
                "render": function(data) {
                    return data ? formatDate(data) : '';
                }
            },
            { 
                "data": "booking_date_end",
                "render": function(data) {
                    return data ? formatDate(data) : '';
                }
            },
            { "data": "car_name" },
            { "data": "booking_type" },
            { "data": "route" },
            { "data": "pickup_address" },
            { 
                "data": "duration",
                "render": function(data) {
                    return data ? data + ' Hari' : '';
                }
            },
            { 
                "data": "created_at",
                "render": function(data) {
                    return data ? formatDateTime(data) : '';
                }
            }
        ],
        "order": [[0, 'asc']],
        "language": {
            "processing": "<div class='spinner-border text-primary' role='status'><span class='sr-only'>Memuat...</span></div>",
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json"
        },
        "responsive": true
    });

    // Helper function to escape HTML
    function escapeHtml(unsafe) {
        if (unsafe === null || unsafe === undefined) return '';
        return unsafe
            .toString()
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
    
    // Helper function to format date
    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID');
    }
    
    // Helper function to format date and time
    function formatDateTime(dateTimeString) {
        if (!dateTimeString) return '';
        const date = new Date(dateTimeString);
        return date.toLocaleString('id-ID');
    }
});
</script>