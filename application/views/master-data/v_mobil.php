<div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#carModal">
            <i class="fas fa-plus"></i> Tambah Data Mobil
        </button>
    </div>

    <!-- Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Mobil</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="carsTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be loaded via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="carModalLabel">Form Input Data Mobil</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="carForm">
                    <input type="hidden" id="carId">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Nama Mobil</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama mobil" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Masukkan deskripsi mobil" required></textarea>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">Gambar Mobil</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" accept="image/*" required>
                            <label class="custom-file-label" for="image">Pilih gambar...</label>
                        </div>
                        <div class="mt-2" id="imagePreview"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveCar">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Initialize DataTable and Form Handling -->
<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#carsTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": baseUrl + "master_data/get_cars",
            "type": "POST"
        },
        "language": {
            "url": baseUrl + "sb-admin/js/i18n/Indonesian.json"
        },
        "responsive": true,
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        "pageLength": 10,
        // Disable search on keyup
        "searchDelay": 0,
        "search": {
            "search": "",
            "return": false
        },
        "initComplete": function() {
            var api = this.api();
            // Remove default search handler
            $('.dataTables_filter input').unbind();
            // Add custom search handler for Enter key
            $('.dataTables_filter input').on('keyup', function(e) {
                if (e.keyCode === 13) { // Enter key
                    api.search(this.value).draw();
                }
            });
        },
        "columns": [
            {
                "data": null,
                "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                },
                "orderable": false,
                "width": "5%"
            },
            { "data": "name", "width": "20%" },
            { "data": "description", "width": "30%" },
            {
                "data": "image",
                "render": function(data, type, row) {
                    return data ? '<img src="' + baseUrl + data + '" class="img-thumbnail" style="max-width: 100px; max-height: 60px;">' : '-';
                },
                "orderable": false,
                "width": "15%"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                        <div class="btn-group" role="group">
                            <button class="btn btn-sm btn-primary edit-btn" data-id="${row.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="${row.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                },
                "orderable": false,
                "width": "15%"
            }
        ]
    });

    // Handle edit button click
    $('#carsTable').on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        var $btn = $(this);
        var $icon = $btn.find('i');
        
        // Show loading state
        $icon.removeClass('fa-edit').addClass('fa-spinner fa-spin');
        
        // Fetch car data
        $.ajax({
            url: baseUrl + 'car/get/' + id,
            type: 'GET',
            success: function(response) {
                if (response.status && response.data) {
                    var car = response.data;
                    
                    // Populate form
                    $('#carId').val(car.id);
                    $('#name').val(car.name);
                    $('#description').val(car.description);
                    
                    // Show image preview if exists
                    if (car.image) {
                        $('#imagePreview').html(
                            '<img src="' + baseUrl + car.image + '" class="img-thumbnail" style="max-width: 200px;">' +
                            '<input type="hidden" name="existing_image" value="' + car.image + '">'
                        );
                        $('.custom-file-label').text('Ganti gambar...');
                    } else {
                        $('#imagePreview').empty();
                        $('.custom-file-label').text('Pilih gambar...');
                    }
                    
                    // Change modal title and show
                    $('#carModalLabel').text('Edit Data Mobil');
                    $('#carModal').modal('show');
                } else {
                    throw new Error(response.message || 'Gagal memuat data mobil');
                }
            },
            error: function(xhr) {
                var errorMessage = xhr.responseJSON && xhr.responseJSON.message 
                    ? xhr.responseJSON.message 
                    : 'Terjadi kesalahan saat memuat data';
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage
                });
            },
            complete: function() {
                $icon.removeClass('fa-spinner fa-spin').addClass('fa-edit');
            }
        });
    });

    // Handle delete button click
    $('#carsTable').on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        var $btn = $(this);
        var $row = $btn.closest('tr');
        
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return new Promise((resolve) => {
                    $.ajax({
                        url: baseUrl + 'car/delete/' + id,
                        type: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            resolve(response);
                        },
                        error: function() {
                            resolve({
                                status: false,
                                message: 'Terjadi kesalahan pada server'
                            });
                        }
                    });
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.value && result.value.status === true) {
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: result.value.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    
                    // Remove the row from the table
                    var table = $('#carsTable').DataTable();
                    table.row($row).remove().draw(false);
                } else {
                    // Show error message
                    var errorMsg = (result.value && result.value.message) || 'Gagal menghapus data';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMsg
                    });
                }
            }
        });
    });

    // Handle image preview
    $('#image').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 200px;">');
            }
            reader.readAsDataURL(file);
            $('.custom-file-label').text(file.name);
        }
    });

    // Handle form submission
    $('#saveCar').on('click', function() {
        var formData = new FormData();
        var imageFile = $('#image')[0].files[0];
        var carId = $('#carId').val();
        var $btn = $(this);
        var $icon = $btn.find('i');
        
        // Add form data
        formData.append('name', $('#name').val());
        formData.append('description', $('#description').val());
        
        // Only add ID if we're editing
        if (carId) {
            formData.append('id', carId);
            
            // Add existing image if no new image is being uploaded
            var existingImage = $('input[name="existing_image"]').val();
            if (!imageFile && existingImage) {
                formData.append('existing_image', existingImage);
            }
        } else if (!imageFile) {
            // Require image for new records
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Gambar mobil harus diisi'
            });
            return false;
        }
        
        // Add image file if exists
        if (imageFile) {
            formData.append('image', imageFile);
        }

        // Show loading state
        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' + 
            (carId ? 'Mengupdate...' : 'Menyimpan...'));

        // Send AJAX request
        $.ajax({
            url: baseUrl + 'car/save',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status) {
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    
                    // Close modal and refresh table
                    $('#carModal').modal('hide');
                    $('#carsTable').DataTable().ajax.reload(null, false); // Maintain current page and search
                } else {
                    throw new Error(response.message || 'Terjadi kesalahan');
                }
            },
            error: function(xhr) {
                var errorMessage = 'Terjadi kesalahan pada server';
                try {
                    var response = xhr.responseJSON;
                    if (response && response.message) {
                        errorMessage = response.message;
                    } else if (xhr.responseText) {
                        errorMessage = xhr.responseText;
                    }
                } catch (e) {
                    console.error('Error parsing error response:', e);
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage
                });
            },
            complete: function() {
                // Always re-enable the button
                $btn.prop('disabled', false).html('Simpan');
            }
        });
        
        // Prevent default form submission
        return false;
    });

    // Reset form when modal is closed
    $('#carModal').on('hidden.bs.modal', function () {
        $('#carForm')[0].reset();
        $('.custom-file-label').text('Pilih gambar...');
        $('#imagePreview').empty();
    });
});
</script>