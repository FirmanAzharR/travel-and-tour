<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">List Booking Wisata</h4>
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
                    <table id="bookingTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Booking</th>
                                <th>Nama Customer</th>
                                <th>No. WhatsApp</th>
                                <th>Tanggal Booking</th>
                                <th>Alamat Penjemputan</th>
                                <th>Tujuan Wisata</th>
                                <th>Durasi</th>
                                <th>Jumlah Penumpang</th>
                                <th>Mobil</th>
                            </tr>
                        </thead>
                        <tbody id="bookingTableBody">
                            <!-- Data will be loaded here via AJAX -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="mt-3" id="pagination">
                    <!-- Pagination will be loaded here via AJAX -->
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
<script>
$(document).ready(function() {
    let currentPage = 1;
    
    // Function to load bookings
    function loadBookings(page = 1) {
        currentPage = page;
        const $loading = $('#loading');
        const $tableBody = $('#bookingTableBody');
        const $pagination = $('#pagination');
        
        // Show loading indicator
        $loading.show();
        $tableBody.empty();
        
        // Make AJAX request
        $.ajax({
            url: '<?= site_url('booking/api_get_bookings') ?>',
            type: 'GET',
            data: { page: page },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Populate table
                    if (response.data.length > 0) {
                        let html = '';
                        let no = (page - 1) * 10 + 1;
                        
                        response.data.forEach(function(booking) {
                            html += `
                                <tr>
                                    <td>${no++}</td>
                                    <td>${escapeHtml(booking.booking_code || '')}</td>
                                    <td>${escapeHtml(booking.customer_name || '')}</td>
                                    <td>${escapeHtml(booking.wa_number || '')}</td>
                                    <td>${formatDate(booking.booking_date) || ''}</td>
                                    <td>${escapeHtml(booking.pickup_address || '')}</td>
                                    <td>${escapeHtml(booking.tour_destination || '')}</td>
                                    <td>${escapeHtml(booking.duration || '')} Hari</td>
                                    <td>${escapeHtml(booking.total_passengers || '')} Orang</td>
                                    <td>${escapeHtml(booking.car_name || '')}</td>
                                </tr>
                            `;
                        });
                        
                        $tableBody.html(html);
                        
                        // Create pagination
                        createPagination(response.pagination);
                    } else {
                        $tableBody.html('<tr><td colspan="10" class="text-center">Tidak ada data booking wisata.</td></tr>');
                        $pagination.empty();
                    }
                } else {
                    showError('Gagal memuat data: ' + (response.message || 'Terjadi kesalahan'));
                }
            },
            error: function(xhr, status, error) {
                showError('Terjadi kesalahan: ' + error);
            },
            complete: function() {
                $loading.hide();
                // Initialize DataTables
                initDataTable();
            }
        });
    }
    
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
    
    // Function to create pagination
    function createPagination(pagination) {
        const $pagination = $('#pagination');
        let html = '<nav><ul class="pagination justify-content-center">';
        
        // Previous button
        if (pagination.current_page > 1) {
            html += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="loadBookings(${pagination.current_page - 1}); return false;">
                        &laquo;
                    </a>
                </li>`;
        } else {
            html += `
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>`;
        }
        
        // Page numbers
        for (let i = 1; i <= pagination.total_pages; i++) {
            if (i === pagination.current_page) {
                html += `
                    <li class="page-item active">
                        <span class="page-link">${i}</span>
                    </li>`;
            } else {
                html += `
                    <li class="page-item">
                        <a class="page-link" href="#" onclick="loadBookings(${i}); return false;">${i}</a>
                    </li>`;
            }
        }
        
        // Next button
        if (pagination.current_page < pagination.total_pages) {
            html += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="loadBookings(${pagination.current_page + 1}); return false;">
                        &raquo;
                    </a>
                </li>`;
        } else {
            html += `
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>`;
        }
        
        html += '</ul></nav>';
        $pagination.html(html);
    }
    
    // Function to show error message
    function showError(message) {
        const $tableBody = $('#bookingTableBody');
        $tableBody.html(`<tr><td colspan="10" class="text-center text-danger">${message}</td></tr>`);
        $('#pagination').empty();
    }
    
    // Initialize DataTables
    function initDataTable() {
        if ($.fn.DataTable.isDataTable('#bookingTable')) {
            $('#bookingTable').DataTable().destroy();
        }
        
        $('#bookingTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            "paging": false,
            "searching": true,
            "info": false,
            "ordering": true,
            "language": {
                "search": "Cari:",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)"
            }
        });
    }
    
    // Initial load
    loadBookings(1);
    
    // Make loadBookings available globally for pagination
    window.loadBookings = loadBookings;
});
</script>