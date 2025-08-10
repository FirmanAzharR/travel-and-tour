<section id="konten-atas" style="margin-bottom: 20px;">
   <h3>Konten Atas</h3>
   <hr>
   <div class="row align-items-stretch">
      <!-- Kolom 1 -->
      <div class="col-md-4">
         <div class="card h-100">
            <div class="card-body d-flex flex-column">
               <form id="logoForm" class="flex-fill">
                  <h3 class="mb-4 text-center">Preview Logo</h3>
                  <div class="form-group">
                     <label for="fileInput">Pilih Gambar (Max 2MB)</label>
                     <input type="file" id="fileInput" name="logo" class="form-control-file" accept="image/*" required>
                     <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF</small>
                  </div>
                  <div id="preview" class="image-preview">
                     <?php if (isset($latest_logo) && !empty($latest_logo->url_image)): ?>
                        <img src="<?= base_url($latest_logo->url_image) ?>" class="img-fluid">
                     <?php else: ?>
                        <i class="fas fa-image"></i>
                        <p class="placeholder mb-0">Gambar belum dipilih</p>
                     <?php endif; ?>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary mt-auto" id="btnUpload">
                     <span id="btnLogoText"><?= isset($latest_logo) ? 'Update Logo' : 'Simpan Logo' ?></span>
                     <span id="btnLoading" class="spinner-border spinner-border-sm d-none" role="status"></span>
                  </button>
               </form>
            </div>
         </div>
      </div>
      <!-- Kolom 2 -->
      <div class="col-md-4">
         <div class="card h-100">
            <div class="card-body d-flex flex-column">
               <form id="titleDescriptionForm" class="flex-fill">
                  <div class="form-group">
                     <label for="judul">Judul</label>
                     <input type="text" id="judul" name="title" class="form-control" value="<?= isset($web_data->title) ? html_escape($web_data->title) : '' ?>">
                  </div>
                  <div class="form-group">
                     <label for="deskripsi">Deskripsi</label>
                     <textarea id="deskripsi" name="description" cols="30" rows="5" class="form-control"><?= isset($web_data->description) ? html_escape($web_data->description) : '' ?></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary mt-auto" id="btnSaveText">
                     <span id="btnSaveTextText">Simpan Text</span>
                     <span id="textLoading" class="spinner-border spinner-border-sm d-none" role="status"></span>
                  </button>
               </form>
            </div>
         </div>
      </div>
      <!-- Kolom 3 -->
      <div class="col-md-4">
         <div class="card h-100">
            <div class="card-body d-flex flex-column">
               <form id="videoForm" class="flex-fill">
                  <h3 class="mb-4 text-center">Preview Video dari Link</h3>
                  <div class="form-group">
                     <label for="videoLink">Masukkan Link Video (YouTube)</label>
                     <input type="text" id="videoLink" name="video_url" class="form-control" 
                            placeholder="https://www.youtube.com/watch?v=xxxx" 
                            value="<?= isset($video_data->link_video) ? html_escape($video_data->link_video) : '' ?>">
                  </div>
                  <div id="videoPreview" class="video-preview">
                     <?php if (isset($video_data) && !empty($video_data->link_video)): 
                        preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^&\n?#]+)/', $video_data->link_video, $youtube_match);
                        $video_id = !empty($youtube_match[1]) ? $youtube_match[1] : '';
                        if (!empty($video_id)): ?>
                           <iframe src="https://www.youtube.com/embed/<?= $video_id ?>" 
                                   frameborder="0" allowfullscreen 
                                   style="width: 100%; height: 200px;"></iframe>
                     <?php else: ?>
                        <i class="fas fa-video"></i>
                        <p class="placeholder mb-0">Link video tidak valid</p>
                     <?php endif; ?>
                     <?php else: ?>
                        <i class="fas fa-video"></i>
                        <p class="placeholder mb-0">Belum ada video yang ditampilkan</p>
                     <?php endif; ?>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary mt-auto" id="btnSaveVideo">
                     <span id="btnVideoText">Simpan Video</span>
                     <span id="videoLoading" class="spinner-border spinner-border-sm d-none" role="status"></span>
                  </button>
               </form>
            </div>
         </div>
      </div>
   </div>

   <style>
      .image-preview, .video-preview {
         border: 2px dashed #ccc;
         border-radius: 10px;
         padding: 15px;
         text-align: center;
         background-color: #f8f9fa;
         position: relative;
         min-height: 200px;
         display: flex;
         align-items: center;
         justify-content: center;
         flex-direction: column;
      }
      .image-preview img {
         max-width: 100%;
         max-height: 200px;
         border-radius: 8px;
         box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
      }
      .placeholder {
         color: #aaa;
         font-size: 1.2rem;
         margin-top: 10px;
      }
      .fa-image, .fa-video {
         font-size: 3rem;
         color: #6c757d;
         margin-bottom: 10px;
      }
   </style>

   <script>
      // Initialize Toast if it doesn't exist
      if (typeof Toast === 'undefined') {
         var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
         });
      }

      // Function to update preview with selected image
      function updateImagePreview(input) {
         const preview = document.getElementById('preview');
         const file = input.files[0];
         
         if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
               preview.innerHTML = `<img src="${e.target.result}" class="img-fluid">`;
            };
            
            reader.readAsDataURL(file);
         } else {
            // If no file is selected, show the current logo or placeholder
            const currentLogo = '<?= isset($latest_logo->url_image) && !empty($latest_logo->url_image) ? base_url($latest_logo->url_image) : "" ?>';
            if (currentLogo) {
               preview.innerHTML = `<img src="${currentLogo}" class="img-fluid">`;
            } else {
               preview.innerHTML = `
                  <i class="fas fa-image"></i>
                  <p class="placeholder mb-0">Gambar belum dipilih</p>
               `;
            }
         }
      }

      // Handle file input change
      document.getElementById('fileInput').addEventListener('change', function() {
         updateImagePreview(this);
      });

      // Handle logo form submission
      $('#logoForm').on('submit', function(e) {
         e.preventDefault();
         
         const $form = $(this);
         const $btn = $('#btnUpload');
         const $btnText = $('#btnLogoText');
         const $loading = $('#btnLoading');
         const formData = new FormData($form[0]);
         
         // Show loading state
         $btn.prop('disabled', true);
         $btnText.text('Mengupload...');
         $loading.removeClass('d-none');
         
         // Send AJAX request
         $.ajax({
            url: '<?= site_url('content_management/upload_logo') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
               if (response.status === 'success') {
                  // Update button text to indicate it's an update now
                  $btnText.text('Update Logo');
                  
                  // Clear the file input
                  // $form[0].reset();
                  
                  // Update preview with the new image from server
                  updateImagePreview(document.getElementById('fileInput'));
                  
                  Toast.fire({
                     icon: 'success',
                     title: response.message
                  });
               } else {
                  // If upload fails, reset to current logo
                  updateImagePreview(document.getElementById('fileInput'));
                  
                  Toast.fire({
                     icon: 'error',
                     title: response.message || 'Terjadi kesalahan saat mengupload logo'
                  });
               }
            },
            error: function(xhr) {
               // Reset to current logo on error
               updateImagePreview(document.getElementById('fileInput'));
               
               let errorMsg = 'Terjadi kesalahan pada server';
               try {
                  const response = JSON.parse(xhr.responseText);
                  if (response.message) {
                     errorMsg = response.message;
                  }
               } catch (e) {}
               
               Toast.fire({
                  icon: 'error',
                  title: errorMsg
               });
            },
            complete: function() {
               // Reset form and button state
               $btn.prop('disabled', false);
               $loading.addClass('d-none');
               // Don't reset the form to keep the selected file
            }
         });
      });

      // Handle title and description form submission
      $('#titleDescriptionForm').on('submit', function(e) {
         e.preventDefault();
         
         const $btn = $('#btnSaveText');
         const $btnText = $('#btnSaveTextText');
         const $loading = $('#textLoading');
         
         // Show loading state
         $btn.prop('disabled', true);
         $btnText.text('Menyimpan...');
         $loading.removeClass('d-none');
         
         // Get form data
         const formData = $(this).serialize();
         
         // Send AJAX request
         $.ajax({
            url: '<?= site_url('content_management/update_web_title_description') ?>',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function(response) {
               if (response.status === 'success') {
                  Toast.fire({
                     icon: 'success',
                     title: response.message
                  });
               } else {
                  Toast.fire({
                     icon: 'error',
                     title: response.message || 'Terjadi kesalahan saat menyimpan data'
                  });
               }
            },
            error: function() {
               Toast.fire({
                  icon: 'error',
                  title: 'Terjadi kesalahan pada server'
               });
            },
            complete: function() {
               // Reset button state
               $btn.prop('disabled', false);
               $btnText.text('Simpan Text');
               $loading.addClass('d-none');
            }
         });
      });

      // Handle video preview on input
      $('#videoLink').on('input', function() {
         const url = $(this).val().trim();
         const videoPreview = $('#videoPreview');
         const youtubeMatch = url.match(/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^&\n?#]+)/);

         if (youtubeMatch && youtubeMatch[1]) {
            const videoId = youtubeMatch[1];
            videoPreview.html(`
               <iframe src="https://www.youtube.com/embed/${videoId}" 
                       frameborder="0" allowfullscreen 
                       style="width: 100%; height: 200px;"></iframe>
            `);
         } else if (url === '') {
            videoPreview.html(`
               <i class="fas fa-video"></i>
               <p class="placeholder mb-0">Belum ada video yang ditampilkan</p>
            `);
         } else {
            videoPreview.html(`
               <i class="fas fa-video"></i>
               <p class="placeholder mb-0">Link video tidak valid</p>
            `);
         }
      });

      // Handle video form submission
      $('#videoForm').on('submit', function(e) {
         e.preventDefault();
         
         const $form = $(this);
         const $btn = $('#btnSaveVideo');
         const $btnText = $('#btnVideoText');
         const $loading = $('#videoLoading');
         const formData = $form.serialize();
         
         // Show loading state
         $btn.prop('disabled', true);
         $btnText.text('Menyimpan...');
         $loading.removeClass('d-none');
         
         // Send AJAX request
         $.ajax({
            url: '<?= site_url('content_management/update_video') ?>',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function(response) {
               if (response.status === 'success') {
                  // Update button text
                  $btnText.text('Simpan Video');
                  
                  // Update preview with the new video
                  if (response.embed_url) {
                     $('#videoPreview').html(`
                        <iframe src="${response.embed_url}" 
                                frameborder="0" allowfullscreen 
                                style="width: 100%; height: 200px;"></iframe>
                     `);
                  }
                  
                  Toast.fire({
                     icon: 'success',
                     title: response.message
                  });
               } else {
                  Toast.fire({
                     icon: 'error',
                     title: response.message || 'Terjadi kesalahan saat menyimpan video'
                  });
               }
            },
            error: function(xhr) {
               let errorMsg = 'Terjadi kesalahan pada server';
               try {
                  const response = JSON.parse(xhr.responseText);
                  if (response.message) {
                     errorMsg = response.message;
                  }
               } catch (e) {}
               
               Toast.fire({
                  icon: 'error',
                  title: errorMsg
               });
            },
            complete: function() {
               // Reset button state
               $btn.prop('disabled', false);
               $btnText.text('Simpan Video');
               $loading.addClass('d-none');
            }
         });
      });
   </script>
</section>
