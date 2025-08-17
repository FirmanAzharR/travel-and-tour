<div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tourPackageModal">
            <i class="fas fa-plus"></i> Tambah Paket Tour
        </button>
    </div>

    <!-- Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Paket Tour</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tourPackagesTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Tipe</th>
                            <th>Durasi</th>
                            <th>Harga</th>
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
<div class="modal fade" id="tourPackageModal" tabindex="-1" role="dialog" aria-labelledby="tourPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="tourPackageModalLabel">Form Input Paket Tour</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tourPackageForm">
                    <input type="hidden" id="packageId">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Nama Paket</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama paket" required>
                    </div>

                    <!-- Type -->
                    <div class="form-group">
                        <label for="type">Tipe Paket</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Pilih Tipe Paket</option>
                            <option value="wisata">Wisata</option>
                            <option value="city_tour">City Tour</option>
                        </select>
                    </div>

                    <!-- Duration -->
                    <div class="form-group">
                        <label for="duration">Durasi</label>
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="Contoh: 2 Hari 1 Malam" required>
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label for="price">Harga (Rp)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga paket" min="0" required>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi paket" required></textarea>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">Gambar Paket</label>
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
                <button type="button" class="btn btn-primary" id="savePackage">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Initialize DataTable and Form Handling -->
<script>
$(document).ready(function() {
    var baseUrl = '<?= base_url() ?>';
    
    // Initialize DataTable
    var table = $('#tourPackagesTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": baseUrl + "Tour_Package/list_tour_package",
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
                "data": "type",
                "width": "10%",
                "render": function(data) {
                    if (data === 'wisata') return 'Wisata';
                    if (data === 'city_tour') return 'City Tour';
                    return '-';
                }
            },
            { 
                "data": "duration",
                "width": "15%"
            },
            { 
                "data": "price",
                "width": "15%",
                "render": function(data, type, row) {
                    return 'Rp ' + parseFloat(data || 0).toLocaleString('id-ID');
                }
            },
            { 
                "data": "description",
                "width": "20%"
            },
            {
                "data": "image",
                "className": "text-center",
                "width": "10%",
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
                "width": "15%",
                "orderable": false,
                "searchable": false
            }
        ],
        "order": [[1, 'asc']]
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
    $('#tourPackagesTable').on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        
        $.ajax({
            url: baseUrl + 'Tour_Package/get/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    var package = response.data;
                    $('#packageId').val(package.id);
                    $('#name').val(package.name);
                    $('#type').val(package.type);
                    $('#description').val(package.description);
                    $('#duration').val(package.duration);
                    $('#price').val(package.price);
                    
                    if (package.image) {
                        $('#imagePreview').html('<img src="' + baseUrl + package.image + '" class="img-fluid" style="max-height: 200px;">');
                    } else {
                        $('#imagePreview').html('');
                    }
                    
                    $('#tourPackageModal').modal('show');
                } else {
                    Swal.fire('Error', response.message || 'Gagal mengambil data paket', 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Terjadi kesalahan saat mengambil data paket', 'error');
            }
        });
    });

    // Handle delete button click
    $('#tourPackagesTable').on('click', '.delete-btn', function() {
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
                    url: baseUrl + 'Tour_Package/delete/' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            table.row($row).remove().draw(false);
                            Swal.fire('Berhasil!', 'Data paket berhasil dihapus', 'success');
                        } else {
                            Swal.fire('Error', response.message || 'Gagal menghapus data paket', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan saat menghapus data paket', 'error');
                    }
                });
            }
        });
    });

    // Handle form submission
    $('#savePackage').on('click', function() {
        var formData = new FormData();
        var imageFile = $('#image')[0].files[0];
        var packageId = $('#packageId').val();
        var $btn = $(this);
        
        // Add form data
        formData.append('name', $('#name').val());
        formData.append('type', $('#type').val());
        formData.append('description', $('#description').val());
        formData.append('duration', $('#duration').val());
        formData.append('price', $('#price').val());
        if (imageFile) {
            formData.append('image', imageFile);
        }
        
        // For update, include the package ID
        if (packageId) {
            formData.append('id', packageId);
        }
        
        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...');
        
        $.ajax({
            url: baseUrl + 'Tour_Package/save',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('#tourPackageModal').modal('hide');
                    table.ajax.reload();
                    Swal.fire('Berhasil!', response.message || 'Data paket berhasil disimpan', 'success');
                    resetForm();
                } else {
                    Swal.fire('Error', response.message || 'Gagal menyimpan data paket', 'error');
                }
            },
            error: function(xhr) {
                var errorMessage = 'Terjadi kesalahan saat menyimpan data paket';
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
    $('#tourPackageModal').on('hidden.bs.modal', function () {
        resetForm();
    });
    
    // Function to reset form
    function resetForm() {
        $('#tourPackageForm')[0].reset();
        $('#packageId').val('');
        $('#duration').val('');
        $('#price').val('');
        $('#imagePreview').html('');
        $('.custom-file-label').html('Pilih gambar...');
    }
});
</script>