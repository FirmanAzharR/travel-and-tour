<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">List Booking Bandara</h4>
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
                    <table id="bookingAirportTable" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Customer</th>
                                <th>No. WhatsApp</th>
                                <th>Nama Bandara</th>
                                <th>Alamat Jemput</th>
                                <th>Alamat Tujuan</th>
                                <th>Tgl. Booking</th>
                                <th>Waktu Jemput</th>
                                <th>Waktu Tiba Bandara</th>
                                <th>Waktu Penerbangan</th>
                                <th>Nomor Penerbangan</th>
                                <th>Jml. Penumpang</th>
                                <th>Layanan</th>
                                <th>Barang Bagasi</th>
                                <th>Tipe Booking</th>
                                <th>Tanggal Input</th>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<style>
/* Loading indicator styles */
#loading {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    background: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* DataTables processing indicator */
.dataTables_processing {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}
</style>

<script>
$(document).ready(function() {
    // Hide loading indicator initially (in case JavaScript is enabled)
    $('#loading').hide();

    // Initialize DataTable with server-side processing
    var table = $('#bookingAirportTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= site_url('booking/api_get_airport_bookings_datatables') ?>",
            "type": "POST",
            "dataSrc": function(json) {
                console.log('Received data:', json); // Debug: log received data
                // Hide loading indicator when data is loaded
                $('#loading').hide();
                return json.data;
            },
            "error": function(xhr, error, thrown) {
                // Hide loading indicator on error
                $('#loading').hide();
                console.error('Error loading data:', error, thrown);
            }
        },
        "initComplete": function(settings, json) {
            // Hide loading indicator when table is fully initialized
            $('#loading').hide();
        },
        "columns": [{ // No
                "data": null,
                "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                "orderable": false
            },
            {
                "data": "booking_code"
            },
            {
                "data": "customer_name"
            },
            {
                "data": "wa_number"
            },
            {
                "data": "airport_name"
            },
            {
                "data": "pickup_address"
            },
            {
                "data": "destination_address"
            },
            {
                "data": "booking_date",
                "render": function(data) {
                    return data ? formatDate(data) : '';
                }
            },
            {
                "data": "pickup_time"
            },
            {
                "data": "arrival_time"
            },
            {
                "data": "flight_time"
            },
            {
                "data": "flight_number"
            },
            {
                "data": "total_passengers"
            },
            {
                "data": "services"
            },
            {
                "data": "luggage_items"
            },
            {
                "data": "booking_type"
            },
            {
                "data": "created_at",
                "render": function(data, type, row) {
                    if (!data) return '';
                    try {
                        const date = new Date(data);
                        if (isNaN(date.getTime())) return data;
                        return date.toLocaleString('id-ID');
                    } catch (e) {
                        console.error('Date formatting error:', e);
                        return data;
                    }
                }
            }
        ],
        "order": [
            [0, 'asc']
        ],
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
        try {
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID');
        } catch (e) {
            console.error('Date formatting error:', e);
            return dateString;
        }
    }

    // Helper function to format date and time
    function formatDateTime(dateTimeString) {
        if (!dateTimeString) return '';
        try {
            const date = new Date(dateTimeString);
            return date.toLocaleString('id-ID');
        } catch (e) {
            console.error('Date/Time formatting error:', e);
            return dateTimeString;
        }
    }
});
</script>