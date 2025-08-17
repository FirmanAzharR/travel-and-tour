<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="konten-popup-image">
    <h3>PopUp Image Management</h3>
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
                        <div class="image-list-container" style="overflow-x: auto; white-space: nowrap; padding: 10px 0;">
                            <div class="row flex-nowrap" id="imageList" style="display: inline-flex; margin: 0 -5px;">
                                <?php if (empty($images)): ?>
                                    <div class="col-12 text-center py-5" style="min-width: 100%;">
                                        <i class="fas fa-images fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Belum ada gambar yang diupload</p>
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($images as $image): ?>
                                        <div class="col-auto mb-4 image-item" data-id="<?= $image->id ?>" style="padding: 0 5px; float: none; display: inline-block;">
                                            <div class="card shadow-sm h-100" style="width: 200px;">
                                                <img src="<?= base_url($image->url_image) ?>" class="card-img-top img-thumbnail" 
                                                     style="height: 150px; object-fit: cover;" 
                                                     alt="Popup Image <?= $image->id ?>">
                                                <div class="card-body p-2 text-center">
                                                    <small class="text-muted">
                                                        <?= date('d M Y H:i', strtotime($image->created_at)) ?>
                                                    </small>
                                                    <button class="btn btn-sm btn-danger btn-block delete-image" 
                                                            data-id="<?= $image->id ?>"
                                                            data-toggle="tooltip" 
                                                            title="Hapus Gambar">
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
    }
    .dropzone:hover, .dropzone.dragover {
        border-color: #0d6efd;
        background-color: #f8f9fa;
    }
    .image-item {
        transition: transform 0.2s;
    }
    .image-item:hover {
        transform: translateY(-3px);
    }
    #preview {
        max-width: 100%;
        margin: 0 auto;
    }
    #preview img {
        max-width: 100%;
        max-height: 200px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
</style>

<script>
$(document).ready(function() {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Check if max images reached
    function checkMaxImages() {
        const maxImages = 10;
        const currentCount = $('.image-item').length;
        if (currentCount >= maxImages) {
            $('#maxAlert').show();
            $('#uploadButton').prop('disabled', true);
        } else {
            $('#maxAlert').hide();
            $('#uploadButton').prop('disabled', false);
        }
    }
    
    // Initialize dropzone
    const dropzone = $('#dropzone');
    const fileInput = $('#fileInput');
    const preview = $('#preview');
    
    // Click on dropzone - prevent event propagation
    dropzone.on('click', function(e) {
        e.stopPropagation();
        fileInput.trigger('click');
    });

    // Prevent dropzone click from triggering on children
    dropzone.find('*').on('click', function(e) {
        e.stopPropagation();
    });
    
    // File selected
    fileInput.on('change', function(e) {
        if (this.files && this.files[0]) {
            handleFiles(this.files);
        }
    });
    
    // Handle drag and drop
    dropzone.on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        dropzone.addClass('dragover');
    });
    
    dropzone.on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        dropzone.removeClass('dragover');
    });
    
    dropzone.on('drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
        dropzone.removeClass('dragover');
        
        if (e.originalEvent.dataTransfer.files.length) {
            handleFiles(e.originalEvent.dataTransfer.files);
        }
    });
    
    // Handle file preview
    function handleFiles(files) {
        preview.empty();
        if (files && files.length > 0) {
            const file = files[0];
            if (file.type.match('image.*')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.html(`<img src="${e.target.result}" class="img-fluid mb-2">`);
                    $('#uploadButton').prop('disabled', false);
                };
                reader.readAsDataURL(file);
            } else {
                alert('Hanya file gambar yang diizinkan (JPG, PNG)');
                fileInput.val(''); // Reset file input
            }
        }
    }
    
    // Handle form submission
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        if (!fileInput[0].files || fileInput[0].files.length === 0) {
            alert('Silakan pilih gambar terlebih dahulu');
            return;
        }
        
        // Show loading state
        const uploadBtn = $('#uploadButton');
        const originalBtnText = uploadBtn.html();
        uploadBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Mengunggah...');
        
        // Send AJAX request
        $.ajax({
            url: '<?= site_url('content_management/upload_popup_image') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Add new image to the list without reloading
                    const newImage = `
                        <div class="col-auto mb-4 image-item" data-id="${response.image_id}" style="padding: 0 5px; float: none; display: inline-block;">
                            <div class="card shadow-sm h-100" style="width: 200px;">
                                <img src="${response.image_url}" class="card-img-top img-thumbnail" 
                                     style="height: 150px; object-fit: cover;" 
                                     alt="Popup Image">
                                <div class="card-body p-2 text-center">
                                    <small class="text-muted">
                                        Baru saja
                                    </small>
                                    <button class="btn btn-sm btn-danger btn-block delete-image" 
                                            data-id="${response.image_id}"
                                            data-toggle="tooltip" 
                                            title="Hapus Gambar">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>`;
                    
                    // Remove "no images" message if it exists
                    if ($('#imageList').find('.col-12.text-center').length) {
                        $('#imageList').html(newImage);
                    } else {
                        $('#imageList').prepend(newImage);
                    }
                    
                    // Re-initialize tooltips for the new element
                    $('[data-toggle="tooltip"]').tooltip();
                    
                    // Update max images check
                    checkMaxImages();
                    
                    // Reset form and preview
                    $('#uploadForm')[0].reset();
                    preview.empty();
                    
                    // Show success toast
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    
                    Toast.fire({
                        icon: 'success',
                        title: 'Gambar berhasil diupload'
                    });
                } else {
                    Swal.fire(
                        'Gagal!',
                        response.message || 'Terjadi kesalahan saat mengunggah gambar',
                        'error'
                    );
                    fileInput.val(''); // Reset file input on error
                }
            },
            error: function(xhr) {
                const errorMsg = xhr.responseJSON && xhr.responseJSON.message 
                    ? xhr.responseJSON.message 
                    : 'Terjadi kesalahan saat mengunggah gambar';
                alert(errorMsg);
                fileInput.val(''); // Reset file input on error
            },
            complete: function() {
                uploadBtn.prop('disabled', false).html(originalBtnText);
            }
        });
    });
    
    // Handle delete image
    $(document).on('click', '.delete-image', function(e) {
        e.preventDefault();
        const deleteBtn = $(this);
        const imageId = deleteBtn.data('id');
        const imageElement = deleteBtn.closest('.image-item');
        
        Swal.fire({
            title: 'Hapus Gambar?',
            text: "Apakah Anda yakin ingin menghapus gambar ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                const originalBtnText = deleteBtn.html();
                deleteBtn.html('<i class="fas fa-spinner fa-spin"></i> Menghapus...').prop('disabled', true);
                
                $.ajax({
                    url: '<?= site_url('content_management/delete_popup_image/') ?>' + imageId,
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Show success toast
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer);
                                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                                }
                            });
                            
                            Toast.fire({
                                icon: 'success',
                                title: 'Gambar berhasil dihapus'
                            });
                            
                            // Remove the image card with animation
                            imageElement.fadeOut(300, function() {
                                $(this).remove();
                                checkMaxImages();
                                
                                // Show message if no images left
                                if ($('.image-item').length === 0) {
                                    const noImagesHtml = `
                                        <div class="col-12 text-center py-5" style="min-width: 100%;">
                                            <i class="fas fa-images fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">Belum ada gambar yang diupload</p>
                                        </div>`;
                                    $('#imageList').html(noImagesHtml);
                                }
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                response.message || 'Terjadi kesalahan saat menghapus gambar',
                                'error'
                            );
                            deleteBtn.html(originalBtnText).prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        const errorMsg = xhr.responseJSON && xhr.responseJSON.message 
                            ? xhr.responseJSON.message 
                            : 'Terjadi kesalahan saat menghapus gambar';
                        Swal.fire(
                            'Error!',
                            errorMsg,
                            'error'
                        );
                        deleteBtn.html(originalBtnText).prop('disabled', false);
                    }
                });
            }
        });
    });
    
    // Initial check
    checkMaxImages();
});
</script>