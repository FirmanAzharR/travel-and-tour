<div class="container-fluid">
    <!-- Button trigger modal -->
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#artikelModal">
            <i class="fas fa-plus"></i> Tambah Artikel
        </button>
    </div>

    <!-- Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Artikel</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="artikelTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Sub Judul</th>
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
<div class="modal fade" id="artikelModal" tabindex="-1" role="dialog" aria-labelledby="artikelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="artikelModalLabel">Form Artikel</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="artikelForm">
                    <input type="hidden" id="id">
                    
                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Judul Artikel</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul artikel" required>
                    </div>

                    <!-- Subtitle -->
                    <div class="form-group">
                        <label for="subtitle">Sub Judul</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Masukkan sub judul">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Masukkan isi artikel" required></textarea>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">Gambar Utama</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                            <label class="custom-file-label" for="image">Pilih gambar...</label>
                        </div>
                        <small class="form-text text-muted">Ukuran maksimal 2MB. Format yang didukung: JPG, JPEG, PNG, GIF</small>
                        <div class="mt-2" id="imagePreview"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="saveArtikel">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Initialize DataTable and Form Handling -->
<script>
$(document).ready(function() {
    var baseUrl = '<?= base_url() ?>';
    
    // Initialize DataTable
    var table = $('#artikelTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": baseUrl + "artikel/list_artikel",
            "type": "POST",
            "dataType": "json",
            "error": function(xhr, error, code) {
                console.error('DataTables error:', error);
                console.error('Status:', xhr.status);
                console.error('Response:', xhr.responseText);
            }
        },
        "language": {
            "url": baseUrl + "sb-admin/js/i18n/Indonesian.json"
        },
        "responsive": true,
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        "pageLength": 10,
        "searchDelay": 500,
        "columns": [
            { 
                "data": "id",
                "orderable": false,
                "width": "5%"
            },
            { "data": "title", "width": "20%" },
            { 
                "data": "subtitle", 
                "width": "15%",
                "defaultContent": "-"  // Handle null/undefined subtitle
            },
            { 
                "data": "description",
                "render": function(data, type, row) {
                    if (type === 'display') {
                        return data ? (data.length > 100 ? data.substring(0, 100) + '...' : data) : '-';
                    }
                    return data;
                },
                "width": "30%" 
            },
            {
                "data": "image",
                "render": function(data, type, row) {
                    if (type === 'display') {
                        return data ? '<img src="' + baseUrl + data + '" class="img-thumbnail" style="max-width: 100px; max-height: 60px;">' : '-';
                    }
                    return data;
                },
                "orderable": false,
                "width": "15%"
            },
            {
                "data": "actions",
                "orderable": false,
                "width": "15%"
            }
        ]
    });

    // Handle edit button click
    $('#artikelTable').on('click', '.edit-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var $btn = $(this);
        var $icon = $btn.find('i');
        
        // Show loading state
        $icon.removeClass('fa-edit').addClass('fa-spinner fa-spin');
        
        // Fetch article data
        $.ajax({
            url: baseUrl + 'artikel/get/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status && response.data) {
                    var artikel = response.data;
                    
                    // Populate form
                    $('#id').val(artikel.id);
                    $('#title').val(artikel.title || '');
                    $('#subtitle').val(artikel.subtitle || '');
                    $('#description').val(artikel.description || '');
                    
                    // Show image preview if exists
                    if (artikel.image) {
                        $('#imagePreview').html(
                            '<img src="' + baseUrl + artikel.image + '" class="img-thumbnail mt-2" style="max-width: 200px;">' +
                            '<input type="hidden" name="existing_image" value="' + artikel.image + '">'
                        );
                        $('.custom-file-label').text('Ganti gambar...');
                    } else {
                        $('#imagePreview').empty();
                        $('.custom-file-label').text('Pilih gambar...');
                    }
                    
                    // Change modal title and show
                    $('#artikelModalLabel').text('Edit Artikel');
                    $('#artikelModal').modal('show');
                } else {
                    Swal.fire('Error', response.message || 'Gagal memuat data artikel', 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                Swal.fire('Error', 'Terjadi kesalahan saat memuat data artikel', 'error');
            },
            complete: function() {
                // Reset button state
                $icon.removeClass('fa-spinner fa-spin').addClass('fa-edit');
            }
        });
    });

    // Handle delete button click
    $('#artikelTable').on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        var $btn = $(this);
        var $row = $btn.closest('tr');
        
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Artikel yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + 'artikel/delete/' + id,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status) {
                            Swal.fire('Berhasil!', 'Artikel berhasil dihapus.', 'success');
                            table.ajax.reload();
                        } else {
                            Swal.fire('Error!', response.message || 'Gagal menghapus artikel', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error!', 'Terjadi kesalahan saat menghapus artikel', 'error');
                    }
                });
            }
        });
    });

    // Handle image preview
    $('#image').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" class="img-thumbnail mt-2" style="max-width: 200px;">');
            }
            reader.readAsDataURL(file);
            $('.custom-file-label').text(file.name);
        }
    });

    // Reset form when modal is closed
    $('#artikelModal').on('hidden.bs.modal', function() {
        $('#artikelForm')[0].reset();
        $('#imagePreview').empty();
        $('.custom-file-label').text('Pilih gambar...');
        $('#artikelModalLabel').text('Tambah Artikel Baru');
    });

    // Handle form submission
    $('#saveArtikel').on('click', function() {
        var formData = new FormData();
        var imageFile = $('#image')[0].files[0];
        var id = $('#id').val();
        var $btn = $(this);
        var $btnText = $btn.html();
        
        // Add form data
        formData.append('id', id || '');
        formData.append('title', $('#title').val());
        formData.append('subtitle', $('#subtitle').val());
        formData.append('description', $('#description').val());
        
        // Add image file if selected
        if (imageFile) {
            formData.append('image', imageFile);
        } else if ($('input[name="existing_image"]').length) {
            formData.append('existing_image', $('input[name="existing_image"]').val());
        }
        
        // Show loading state
        $btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...');
        
        // Submit form
        $.ajax({
            url: baseUrl + 'artikel/save',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    Swal.fire('Berhasil!', response.message || 'Data berhasil disimpan', 'success');
                    $('#artikelModal').modal('hide');
                    table.ajax.reload();
                } else {
                    Swal.fire('Error!', response.message || 'Gagal menyimpan data', 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                Swal.fire('Error!', 'Terjadi kesalahan saat menyimpan data', 'error');
            },
            complete: function() {
                // Reset button state
                $btn.prop('disabled', false).html($btnText);
            }
        });
    });
});
</script>