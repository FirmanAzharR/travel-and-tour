<section id="konten-atas" style="margin-bottom: 20px;">
   <h3>Konten Atas</h3>
   <hr>
   <div class="row align-items-stretch">
      <!-- Kolom 1 -->
      <div class="col-md-4">
         <div class="card h-100">
            <div class="card-body d-flex flex-column">
               <form action="" class="flex-fill">
                  <h3 class="mb-4 text-center">Preview Gambar</h3>
                  <div class="form-group">
                     <label for="fileInput">Pilih Gambar</label>
                     <input type="file" id="fileInput" class="form-control-file" accept="image/*">
                  </div>
                  <div id="preview" class="image-preview">
                     <i class="fas fa-image"></i>
                     <p class="placeholder mb-0">Belum ada gambar yang dipilih</p>
                  </div>
                  <br>
                  <button class="btn btn-primary mt-auto">Simpan Logo</button>
               </form>
            </div>
         </div>
      </div>
      <!-- Kolom 2 -->
      <div class="col-md-4">
         <div class="card h-100">
            <div class="card-body d-flex flex-column">
               <form action="" class="flex-fill">
                  <div class="form-group">
                     <label for="judul">Judul</label>
                     <input type="text" id="judul" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="deskripsi">Deskripsi</label>
                     <textarea id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
                  </div>
                  <button class="btn btn-primary mt-auto">Simpan Text</button>
               </form>
            </div>
         </div>
      </div>
      <!-- Kolom 3 -->
      <div class="col-md-4">
         <div class="card h-100">
            <div class="card-body d-flex flex-column">
               <form action="" class="flex-fill">
                  <h3 class="mb-4 text-center">Preview Video dari Link</h3>
                  <div class="form-group">
                     <label for="videoLink">Masukkan Link Video (YouTube)</label>
                     <input type="text" id="videoLink" class="form-control" placeholder="https://www.youtube.com/watch?v=xxxx">
                  </div>
                  <div id="videoPreview" class="video-preview">
                     <i class="fas fa-video"></i>
                     <p class="placeholder mb-0">Belum ada video yang ditampilkan</p>
                  </div>
                  <br>
                  <button class="btn btn-primary mt-auto">Simpan Video</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <style>
      .image-preview {
      border: 2px dashed #ccc;
      border-radius: 10px;
      padding: 15px;
      text-align: center;
      background-color: #f8f9fa;
      position: relative;
      }
      .image-preview img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
      box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
      }
      .image-preview .placeholder {
      color: #aaa;
      font-size: 1.2rem;
      }
      .image-preview .fa-image {
      font-size: 3rem;
      color: #6c757d;
      margin-bottom: 10px;
      }
   </style>
   <style>
      .video-preview {
      border: 2px dashed #ccc;
      border-radius: 10px;
      padding: 15px;
      text-align: center;
      background-color: #f8f9fa;
      position: relative;
      }
      .video-preview iframe {
      width: 100%;
      height: 300px;
      border-radius: 8px;
      }
      .video-preview .placeholder {
      color: #aaa;
      font-size: 1.2rem;
      }
      .video-preview .fa-video {
      font-size: 3rem;
      color: #6c757d;
      margin-bottom: 10px;
      }
   </style>
   <script>
      const fileInput = document.getElementById('fileInput');
      const preview = document.getElementById('preview');
      
      fileInput.addEventListener('change', function() {
        const file = this.files[0];
      
        if (file && file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
          }
          reader.readAsDataURL(file);
        } else {
          preview.innerHTML = `
            <i class="fas fa-image"></i>
            <p class="placeholder mb-0">File bukan gambar</p>
          `;
        }
      });
   </script>
</section>
