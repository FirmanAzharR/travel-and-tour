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
                                <p class="small text-muted">Format: JPG, PNG | Maks: 500KB</p>
                                <input type="file" id="fileInput" name="image" accept="image/jpeg,image/png" hidden>
                            </div>
                            <div id="preview" class="mt-3 text-center"></div>
                            <div id="fileSizeError" class="alert alert-danger mt-2" style="display: none;">
                                <i class="fas fa-exclamation-triangle"></i> <span id="fileSizeErrorText">Ukuran file melebihi 500KB. Silakan pilih file yang lebih kecil.</span>
                            </div>
                            <div id="removeFileBtn" class="mt-2" style="display: none;">
                                <button type="button" class="btn btn-danger btn-sm" id="removeFileButton">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
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
                                                    <small class="text-muted d-block mb-1">
                                                        <?= date('d M Y H:i', strtotime($image->created_at)) ?>
                                                    </small>
                                                    <?php
                                                    // Get file size
                                                    $file_path = FCPATH . $image->url_image;
                                                    $file_size = 0;
                                                    $file_size_formatted = 'N/A';
                                                    if (file_exists($file_path)) {
                                                        $file_size = filesize($file_path);
                                                        if ($file_size < 1024) {
                                                            $file_size_formatted = $file_size . ' Bytes';
                                                        } elseif ($file_size < 1024 * 1024) {
                                                            $file_size_formatted = round($file_size / 1024, 2) . ' KB';
                                                        } else {
                                                            $file_size_formatted = round($file_size / (1024 * 1024), 2) . ' MB';
                                                        }
                                                    }
                                                    ?>
                                                    <small class="text-muted d-block mb-2">
                                                        <i class="fas fa-file-image"></i> <?= $file_size_formatted ?>
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
            uploadButton.prop('disabled', true);
        } else {
            $('#maxAlert').hide();
            // Only enable button if file is selected and valid
            const file = fileInput[0].files[0];
            if (file && validateFileSize(file)) {
                uploadButton.prop('disabled', false);
            } else {
                uploadButton.prop('disabled', true);
            }
        }
    }
    
    // Initialize dropzone
    const dropzone = $('#dropzone');
    const fileInput = $('#fileInput');
    const preview = $('#preview');
    const uploadButton = $('#uploadButton');
    const removeFileBtn = $('#removeFileBtn');
    const removeFileButton = $('#removeFileButton');
    
    // Click dropzone to open file dialog - using mousedown to prevent recursion
    dropzone.on('mousedown', function(e) {
        e.preventDefault();
        fileInput[0].click();
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
        
        // If no file, return false (button should be disabled)
        if (!file) {
            fileSizeError.hide();
            uploadButton.prop('disabled', true);
            return false;
        }
        
        if (file.size > maxSize) {
            const formattedSize = formatFileSize(file.size);
            fileSizeErrorText.text(`Ukuran file ${formattedSize} melebihi batas maksimal 500KB. Silakan pilih file yang lebih kecil.`);
            fileSizeError.show();
            uploadButton.prop('disabled', true);
            return false;
        } else {
            fileSizeError.hide();
            // Only enable button if file exists and is valid
            if (file) {
                uploadButton.prop('disabled', false);
            }
            return true;
        }
    }
    
    // File selected
    fileInput.on('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            
            // Validate file type
            if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format File Tidak Valid',
                    text: 'Hanya file JPG dan PNG yang diperbolehkan'
                });
                fileInput.val('');
                uploadButton.prop('disabled', true);
                $('#fileSizeError').hide();
                preview.empty();
                removeFileBtn.hide(); // Hide remove button on invalid file
                return;
            }
            
            // Validate size (500KB max)
            if (!validateFileSize(file)) {
                fileInput.val('');
                preview.empty();
                removeFileBtn.hide(); // Hide remove button on invalid file size
                return;
            }
            
            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.html('<img src="' + e.target.result + '" class="img-fluid rounded shadow" alt="Preview">');
                // Only enable button if file is valid and selected
                if (file && validateFileSize(file)) {
                    uploadButton.prop('disabled', false);
                    removeFileBtn.show(); // Show remove button when file is selected
                } else {
                    uploadButton.prop('disabled', true);
                }
            }
            reader.readAsDataURL(file);
        } else {
            // If no file selected, ensure button is disabled
            uploadButton.prop('disabled', true);
            preview.empty();
            removeFileBtn.hide();
        }
    });
    
    // Handle remove file button
    removeFileButton.on('click', function() {
        // Reset file input
        fileInput.val('');
        
        // Clear preview
        preview.empty();
        
        // Hide remove button
        removeFileBtn.hide();
        
        // Disable upload button
        uploadButton.prop('disabled', true);
        
        // Hide error message if any
        $('#fileSizeError').hide();
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
    
    // Handle form submission
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        
        const file = fileInput[0].files[0];
        
        // Validate file is selected
        if (!file) {
            uploadButton.prop('disabled', true); // Ensure button is disabled
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Silakan pilih file gambar terlebih dahulu'
            });
            return;
        }
        
        // Validate file size before submission
        if (!validateFileSize(file)) {
            Swal.fire({
                icon: 'error',
                title: 'Ukuran File Terlalu Besar',
                text: 'Ukuran file melebihi 500KB. Silakan pilih file yang lebih kecil.'
            });
            return;
        }
        
        const formData = new FormData(this);
        
        // Show loading state
        const uploadBtn = $('#uploadButton');
        const originalBtnText = uploadBtn.html();
        uploadBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengunggah...');
        
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
                                    <small class="text-muted d-block mb-1">
                                        Baru saja
                                    </small>
                                    <small class="text-muted d-block mb-2">
                                        <i class="fas fa-file-image"></i> ${response.file_size || 'N/A'}
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
                    removeFileBtn.hide(); // Hide remove button after successful upload
                    uploadButton.prop('disabled', true); // Disable button after upload (no file selected)
                    
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
                    // Reset button state on error
                    uploadBtn.html(originalBtnText).prop('disabled', false);
                    Swal.fire(
                        'Gagal!',
                        response.message || 'Terjadi kesalahan saat mengunggah gambar',
                        'error'
                    );
                    fileInput.val(''); // Reset file input on error
                }
            },
            error: function(xhr) {
                // Reset button state on error
                uploadBtn.html(originalBtnText).prop('disabled', false);
                const errorMsg = xhr.responseJSON && xhr.responseJSON.message 
                    ? xhr.responseJSON.message 
                    : 'Terjadi kesalahan saat mengunggah gambar';
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMsg
                });
                fileInput.val(''); // Reset file input on error
            },
            complete: function() {
                // Only reset if not already reset in error handlers
                if (uploadBtn.prop('disabled')) {
                    uploadBtn.html(originalBtnText).prop('disabled', false);
                }
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
