<div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#busModal">
            <i class="fas fa-plus"></i> Tambah Data Bus
        </button>
    </div>

    <!-- Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Bus</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="busesTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bus</th>
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
<div class="modal fade" id="busModal" tabindex="-1" role="dialog" aria-labelledby="busModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="busModalLabel">Form Input Data Bus</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="busForm">
                    <input type="hidden" id="busId">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Nama Bus</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama bus" required>
                    </div>

                    <!-- Type -->
                    <div class="form-group">
                        <label for="type">Tipe Bus</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Pilih Tipe Bus</option>
                            <option value="bus">Bus</option>
                            <option value="mini bus">Mini Bus</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi bus" required></textarea>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">Gambar Bus</label>
                        <small class="form-text text-muted d-block mb-2">Format: JPG, PNG | Maks: 500KB</small>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/jpeg,image/png" required>
                            <label class="custom-file-label" for="image">Pilih gambar...</label>
                        </div>
                        <div class="mt-2" id="imagePreview"></div>
                        <div id="fileSizeError" class="alert alert-danger mt-2" style="display: none;">
                            <i class="fas fa-exclamation-triangle"></i> <span id="fileSizeErrorText">Ukuran file melebihi 500KB. Silakan pilih file yang lebih kecil.</span>
                        </div>
                        <div id="removeFileBtn" class="mt-2" style="display: none;">
                            <button type="button" class="btn btn-danger btn-sm" id="removeFileButton">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveBus">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Initialize DataTable and Form Handling -->
<script>
$(document).ready(function() {
    var baseUrl = '<?= base_url() ?>';
    
    // Initialize DataTable
    var table = $('#busesTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": baseUrl + "bus/list_bus",
            "type": "POST"
        },
        "language": {
            "url": baseUrl + "sb-admin/js/i18n/Indonesian.json"
        },
        "responsive": true,
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        "pageLength": 10,
        "searchDelay": 0,
        "columns": [
            { 
                "data": "id",
                "orderable": false,
                "searchable": false,
                "className": "text-center",
                "width": "5%"
            },
            { 
                "data": "name",
                "width": "20%"
            },
            { 
                "data": "description",
                "width": "40%"
            },
            {
                "data": "image",
                "className": "text-center",
                "width": "15%",
                "render": function(data, type, row) {
                    if (data) {
                        return '<img src="' + baseUrl + data + '" class="img-thumbnail" style="max-width: 80px; max-height: 60px;">';
                    }
                    return '-';
                },
                "orderable": false,
                "searchable": false
            },
            {
                "data": "actions",
                "className": "text-center",
                "width": "20%",
                "orderable": false,
                "searchable": false
            }
        ],
        "order": [[1, 'asc']],
        "drawCallback": function(settings) {
            // Reinitialize any plugins or add custom code after table draw
        }
    });

    // Function to format file size for display
    function formatFileSize(bytes) {
        const fileSizeMB = bytes / (1024 * 1024);
        if (fileSizeMB < 1) {
            // If less than 1MB, show in KB
            const fileSizeKB = Math.round(bytes / 1024);
            return fileSizeKB + 'KB';
        } else {
            // If 1MB or more, show in MB
            return fileSizeMB.toFixed(2) + 'MB';
        }
    }

    // Function to validate file size (max 500KB)
    function validateFileSize(file) {
        const maxSize = 500 * 1024; // 500KB in bytes
        const fileSizeError = $('#fileSizeError');
        const fileSizeErrorText = $('#fileSizeErrorText');
        
        // If no file, return false (button should be disabled for new records)
        if (!file) {
            fileSizeError.hide();
            return false;
        }
        
        if (file.size > maxSize) {
            const formattedSize = formatFileSize(file.size);
            fileSizeErrorText.text('Ukuran file ' + formattedSize + ' melebihi batas maksimal 500KB. Silakan pilih file yang lebih kecil.');
            fileSizeError.show();
            return false;
        } else {
            fileSizeError.hide();
            return true;
        }
    }

    // Function to validate form and enable/disable save button
    function validateForm() {
        const name = $('#name').val().trim();
        const type = $('#type').val();
        const imageFile = $('#image')[0].files[0];
        const busId = $('#busId').val();
        const existingImage = $('input[name="existing_image"]').val();
        const saveBtn = $('#saveBus');
        
        // Name and type are always required
        const nameValid = name.length > 0;
        const typeValid = type.length > 0;
        
        // Image validation:
        // - For new records: image file is required
        // - For edit: either new image file OR existing image must exist
        let imageValid = false;
        if (busId) {
            // Editing: image file OR existing image is acceptable
            imageValid = imageFile ? validateFileSize(imageFile) : (existingImage ? true : false);
        } else {
            // New record: image file is required and must be valid
            imageValid = imageFile ? validateFileSize(imageFile) : false;
        }
        
        // Enable button only if name, type, and image are valid
        if (nameValid && typeValid && imageValid) {
            saveBtn.prop('disabled', false);
        } else {
            saveBtn.prop('disabled', true);
        }
    }

    // Handle file input change
    $('#image').on('change', function() {
        var file = this.files[0];
        const removeFileBtn = $('#removeFileBtn');
        const removeFileButton = $('#removeFileButton');
        
        if (file) {
            // Validate file type
            if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format File Tidak Valid',
                    text: 'Hanya file JPG dan PNG yang diperbolehkan'
                });
                $(this).val('');
                $('#fileSizeError').hide();
                $('#imagePreview').empty();
                $('.custom-file-label').text('Pilih gambar...');
                removeFileBtn.hide();
                validateForm(); // Re-validate form
                return;
            }
            
            // Validate size (500KB max)
            if (!validateFileSize(file)) {
                $(this).val('');
                $('#imagePreview').empty();
                $('.custom-file-label').text('Pilih gambar...');
                removeFileBtn.hide();
                validateForm(); // Re-validate form
                return;
            }
            
            // Preview image
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 200px;">');
                validateForm(); // Re-validate form after preview
            }
            reader.readAsDataURL(file);
            $('.custom-file-label').text(file.name);
            removeFileBtn.show(); // Show remove button when file is selected
        } else {
            // If no file selected
            $('#imagePreview').empty();
            $('.custom-file-label').text('Pilih gambar...');
            removeFileBtn.hide();
            validateForm(); // Re-validate form
        }
    });
    
    // Handle remove file button
    $('#removeFileButton').on('click', function() {
        // Reset file input
        $('#image').val('');
        
        // Clear preview
        $('#imagePreview').empty();
        $('.custom-file-label').text('Pilih gambar...');
        
        // Hide remove button
        $('#removeFileBtn').hide();
        
        // Hide error message if any
        $('#fileSizeError').hide();
        
        // If editing and existing image exists, restore it
        var busId = $('#busId').val();
        var existingImage = $('input[name="existing_image"]').val();
        if (busId && existingImage) {
            $('#imagePreview').html(
                '<img src="' + baseUrl + existingImage + '" class="img-thumbnail" style="max-width: 200px;">'
            );
            $('.custom-file-label').text('Ganti gambar...');
        }
        
        validateForm(); // Re-validate form
    });
    
    // Handle name input change
    $('#name').on('input', function() {
        validateForm();
    });
    
    // Handle type select change
    $('#type').on('change', function() {
        validateForm();
    });

    // Handle edit button click
    $('#busesTable').on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        
        $.ajax({
            url: baseUrl + 'bus/get/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    var bus = response.data;
                    $('#busId').val(bus.id);
                    $('#name').val(bus.name);
                    $('#type').val(bus.type);
                    $('#description').val(bus.description);
                    
                    // Show image preview if exists
                    if (bus.image) {
                        $('#imagePreview').html(
                            '<img src="' + baseUrl + bus.image + '" class="img-thumbnail" style="max-width: 200px;">' +
                            '<input type="hidden" name="existing_image" value="' + bus.image + '">'
                        );
                        $('.custom-file-label').text('Ganti gambar...');
                        $('#removeFileBtn').hide(); // Hide remove button when editing (existing image)
                        $('#fileSizeError').hide(); // Hide any error message
                    } else {
                        $('#imagePreview').empty();
                        $('.custom-file-label').text('Pilih gambar...');
                        $('#removeFileBtn').hide();
                        $('#fileSizeError').hide();
                    }
                    
                    // Change modal title
                    $('#busModalLabel').text('Edit Data Bus');
                    $('#busModal').modal('show');
                    
                    // Validate form after populating
                    validateForm();
                } else {
                    Swal.fire('Error', response.message || 'Gagal mengambil data bus', 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Terjadi kesalahan saat mengambil data bus', 'error');
            }
        });
    });

    // Handle delete button click
    $('#busesTable').on('click', '.delete-btn', function() {
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
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + 'bus/delete/' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            table.row($row).remove().draw(false);
                            Swal.fire('Berhasil!', 'Data bus berhasil dihapus', 'success');
                        } else {
                            Swal.fire('Error', response.message || 'Gagal menghapus data bus', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat menghapus data bus', 'error');
                    }
                });
            }
        });
    });

    // Handle form submission
    $('#saveBus').on('click', function() {
        var formData = new FormData();
        var imageFile = $('#image')[0].files[0];
        var busId = $('#busId').val();
        var $btn = $(this);
        
        // Validate file size before submission
        if (imageFile && !validateFileSize(imageFile)) {
            Swal.fire({
                icon: 'error',
                title: 'Ukuran File Terlalu Besar',
                text: 'Ukuran file melebihi 500KB. Silakan pilih file yang lebih kecil.'
            });
            return false;
        }
        
        // Add form data
        formData.append('name', $('#name').val());
        formData.append('type', $('#type').val());
        formData.append('description', $('#description').val());
        
        // For update, include the bus ID
        if (busId) {
            formData.append('id', busId);
            
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
                text: 'Gambar bus harus diisi'
            });
            return false;
        }
        
        // Add image file if exists
        if (imageFile) {
            formData.append('image', imageFile);
        }
        
        // Always use the same endpoint
        var url = baseUrl + 'bus/save';
        
        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...');
        
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('#busModal').modal('hide');
                    table.ajax.reload();
                    Swal.fire('Berhasil!', response.message || 'Data bus berhasil disimpan', 'success');
                    resetForm();
                } else {
                    Swal.fire('Error', response.message || 'Gagal menyimpan data bus', 'error');
                }
            },
            error: function(xhr) {
                var errorMessage = 'Terjadi kesalahan saat menyimpan data bus';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                Swal.fire('Error', errorMessage, 'error');
            },
            complete: function() {
                // Always re-enable the button and reset text
                $btn.prop('disabled', false).html('Simpan');
            }
        });
    });
    
    // Reset form when modal is closed
    $('#busModal').on('hidden.bs.modal', function () {
        resetForm();
    });
    
    // Function to reset form
    function resetForm() {
        $('#busForm')[0].reset();
        $('#busId').val('');
        $('#imagePreview').html('');
        $('.custom-file-label').text('Pilih gambar...');
        $('#fileSizeError').hide();
        $('#removeFileBtn').hide();
        $('#busModalLabel').text('Form Input Data Bus'); // Reset modal title
        $('#saveBus').prop('disabled', true); // Disable save button when modal is closed
    }
    
    // Initialize: disable save button on page load
    $('#saveBus').prop('disabled', true);
});
</script>
