<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="konten-gallery-image">
    <h3>Galeri Foto</h3>
    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i> Maksimal 10 gambar dapat diupload. Hapus gambar yang tidak digunakan untuk menambah gambar baru.
    </div>
    <hr>
    <div class="container-fluid">
        <div id="contentContainer">
            <div class="row">
                <div class="col-md-6" style="border-right: 1px solid #ddd;">
                    <div class="container py-3">
                        <h4 class="text-center mb-3">Upload Gambar Baru</h4>
                        <form id="uploadForm" class="text-center" enctype="multipart/form-data">
                            <div id="dropzone" class="dropzone">
                                <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                <p class="mb-0">Tarik & letakkan gambar di sini atau klik untuk memilih</p>
                                <p class="small text-muted">Format: JPG, PNG | Maks: 2MB</p>
                                <input type="file" id="fileInput" name="image" accept="image/jpeg,image/png" hidden>
                            </div>
                            <div id="preview" class="mt-3 text-center"></div>
                            <button type="submit" class="btn btn-primary mt-3" id="uploadButton" disabled>
                                <i class="fas fa-upload"></i> Upload Gambar
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container py-3">
                        <h4 class="mb-3 text-center">Daftar Gambar</h4>
                        <div class="alert alert-warning" id="maxAlert" style="display: none;">
                            <i class="fas fa-exclamation-triangle"></i> Anda telah mencapai batas maksimal 10 gambar. Hapus gambar yang tidak digunakan untuk menambah gambar baru.
                        </div>
                        <div class="row image-list" id="imageList">
                            <?php if (empty($images)): ?>
                                <div class="col-12 text-center py-5">
                                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada gambar yang diupload</p>
                                </div>
                            <?php else: ?>
                                <?php foreach ($images as $image): ?>
                                    <div class="col-md-4 col-6 mb-4 image-item" data-id="<?= $image->id ?>">
                                        <div class="card shadow-sm h-100">
                                            <img src="<?= base_url($image->url_image) ?>" class="card-img-top img-thumbnail" 
                                                 style="height: 150px; object-fit: cover;" 
                                                 alt="Gallery Image <?= $image->id ?>">
                                            <div class="card-body p-2 text-center">
                                                <small class="text-muted d-block mb-2">
                                                    <?= date('d M Y H:i', strtotime($image->created_at)) ?>
                                                </small>
                                                <button class="btn btn-danger btn-sm delete-image" data-id="<?= $image->id ?>">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .dropzone {
        border: 2px dashed #ccc;
        border-radius: 5px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background-color: #f9f9f9;
    }
    
    .dropzone:hover, .dropzone.dragover {
        border-color: #007bff;
        background-color: #e9f5ff;
    }
    
    .dropzone i {
        color: #6c757d;
    }
    
    .dropzone.dragover i {
        color: #007bff;
    }
    
    #preview {
        max-width: 300px;
        margin: 0 auto;
    }
    
    #preview img {
        max-width: 100%;
        max-height: 200px;
        margin-top: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
    }
    
    .image-list .card {
        transition: transform 0.2s;
    }
    
    .image-list .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .image-list {
        margin-top: 20px;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 15px;
        scrollbar-width: thin;
        scrollbar-color: #888 #f1f1f1;
    }
    
    .image-list::-webkit-scrollbar {
        height: 8px;
    }
    
    .image-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .image-list::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    
    .image-list::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    
    .image-list .col-md-4 {
        flex: 0 0 auto;
        width: 250px; /* Fixed width for each image card */
        margin-right: 15px;
    }
    
    .image-list img {
        height: 150px;
        object-fit: cover;
    }
    
    .delete-image {
        transition: all 0.2s;
    }
    
    .delete-image:hover {
        transform: scale(1.05);
    }
</style>

<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Max images check
    const maxImages = 10;
    const currentCount = <?= !empty($images) ? count($images) : 0 ?>;
    if (currentCount >= maxImages) {
        $('#maxAlert').show();
        $('#uploadButton').prop('disabled', true);
    }
    
    // Elements
    const dropzone = $('#dropzone');
    const fileInput = $('#fileInput');
    const preview = $('#preview');
    const uploadButton = $('#uploadButton');
    
    // Click dropzone to open file dialog - using mousedown to prevent recursion
    dropzone.on('mousedown', function(e) {
        e.preventDefault();
        fileInput[0].click();
    });
    
    // Handle file selection (click or drop)
    fileInput.on('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            
            // Validate file type
            if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
                alert('Hanya file JPG dan PNG yang diperbolehkan');
                fileInput.val('');
                return;
            }
            
            // Validate size (2MB max)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                fileInput.val('');
                return;
            }
            
            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.html('<img src="' + e.target.result + '" class="img-fluid rounded shadow" alt="Preview">');
                uploadButton.prop('disabled', false);
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Drag over
    dropzone.on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
    });
    
    // Drag leave
    dropzone.on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
    });
    
    // Drop file (fixed — no recursion)
    dropzone.on('drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
        
        const files = e.originalEvent.dataTransfer.files;
        if (files.length > 0) {
            fileInput[0].files = files; // This will trigger 'change' automatically
        }
    });
    
    // Upload form submit
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const originalBtnText = uploadButton.html();
        
        uploadButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengunggah...');
        
        $.ajax({
            url: '<?= site_url('content_management/upload_gallery_image') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    const imageHtml = `
                        <div class="col-md-4 col-6 mb-4 image-item" data-id="${response.image_id}">
                            <div class="card shadow-sm h-100">
                                <img src="${response.image_url}" class="card-img-top img-thumbnail" 
                                     style="height: 150px; object-fit: cover;" 
                                     alt="Gallery Image ${response.image_id}">
                                <div class="card-body p-2 text-center">
                                    <small class="text-muted d-block mb-2">Baru saja</small>
                                    <button class="btn btn-danger btn-sm delete-image" data-id="${response.image_id}">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    if ($('#imageList .col-12.text-center').length) {
                        $('#imageList').html(imageHtml);
                    } else {
                        $('#imageList').prepend(imageHtml);
                    }
                    
                    $('#uploadForm')[0].reset();
                    preview.empty();
                    uploadButton.prop('disabled', true);
                    
                    if ($('.image-item').length >= maxImages) {
                        $('#maxAlert').show();
                    }
                    
                    // Show success notification
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: function(toast) {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });
                    
                    Toast.fire({
                        icon: 'success',
                        title: 'Gambar berhasil diupload'
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message || 'Terjadi kesalahan saat mengupload gambar',
                        icon: 'error'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat mengupload gambar',
                    icon: 'error'
                });
            },
            complete: function() {
                uploadButton.html(originalBtnText).prop('disabled', false);
            }
        });
    });
    
    // Delete image
    $(document).off('click', '.delete-image').on('click', '.delete-image', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const deleteBtn = $(this);
        if (deleteBtn.hasClass('deleting')) return;
        
        Swal.fire({
            title: 'Hapus Gambar',
            text: 'Apakah Anda yakin ingin menghapus gambar ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (!result.isConfirmed) return;
            
            const imageId = deleteBtn.data('id');
            const imageElement = deleteBtn.closest('.image-item');
            
            deleteBtn.addClass('deleting').prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            
            $.ajax({
                url: '<?= site_url('content_management/delete_gallery_image/') ?>' + imageId,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        imageElement.fadeOut(300, function() {
                            $(this).remove();
                            if ($('.image-item').length === 0) {
                                $('#imageList').html(`
                                    <div class="col-12 text-center py-5">
                                        <i class="fas fa-images fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Belum ada gambar yang diupload</p>
                                    </div>
                                `);
                            }
                            $('#maxAlert').hide();
                            $('#uploadButton').prop('disabled', false);
                        });
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Gambar berhasil dihapus',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat menghapus gambar',
                            icon: 'error'
                        });
                        deleteBtn.removeClass('deleting').prop('disabled', false).html('<i class="fas fa-trash-alt"></i> Hapus');
                    }
                },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menghapus gambar',
                        icon: 'error'
                    });
                    deleteBtn.removeClass('deleting').prop('disabled', false).html('<i class="fas fa-trash-alt"></i> Hapus');
                }
            });
        });
    });
});
</script>

</section>