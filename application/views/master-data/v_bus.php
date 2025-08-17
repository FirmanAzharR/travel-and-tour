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
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                            <label class="custom-file-label" for="image">Pilih gambar...</label>
                        </div>
                        <div class="mt-2" id="imagePreview"></div>
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

    // Handle file input change
    $('#image').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
        
        // Show image preview
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" class="img-fluid" style="max-height: 200px;">');
            }
            reader.readAsDataURL(this.files[0]);
        }
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
                    
                    if (bus.image) {
                        $('#imagePreview').html('<img src="' + baseUrl + bus.image + '" class="img-fluid" style="max-height: 200px;">');
                    } else {
                        $('#imagePreview').html('');
                    }
                    
                    $('#busModal').modal('show');
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
        
        // Add form data
        formData.append('name', $('#name').val());
        formData.append('type', $('#type').val());
        formData.append('description', $('#description').val());
        if (imageFile) {
            formData.append('image', imageFile);
        }
        
        // For update, include the bus ID
        if (busId) {
            formData.append('id', busId);
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
        $('.custom-file-label').html('Pilih gambar...');
    }
});
</script>