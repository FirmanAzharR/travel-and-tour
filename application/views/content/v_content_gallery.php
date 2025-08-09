<section id="konten-gallery-image">
    <h3>Galeri Foto</h3>
    <hr>
    <div class="row">
      <div class="col-md-6" style="border-right: 1px solid #ddd;">
           <div class="container py-5">
      <h3 class="text-center mb-4">Upload Gambar (Drag & Drop)</h3>
      <form id="uploadForm" class="text-center">
         <div id="dropzone" class="dropzone">
            <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
            <p class="mb-0">Tarik & letakkan gambar di sini atau klik untuk memilih</p>
            <input type="file" id="fileInput" name="image" accept="image/*" hidden>
         </div>
         <div id="preview" class="mt-4"></div>
         <button type="submit" class="btn btn-primary mt-4">Upload Image</button>
      </form>
   </div>
      </div>
      <div class="col-md-6">
        <div class="container py-5">
  <h3 class="mb-4 text-center">Daftar Gambar Tersimpan</h3>

  <div class="row image-list" id="imageList">
    <!-- Contoh data awal -->
    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Gambar 1">
        <div class="card-body text-center">
          <h6 class="card-title">Gambar 1</h6>
          <button class="btn btn-danger btn-sm">
            <i class="fas fa-trash-alt"></i> Hapus
          </button>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card shadow-sm">
        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Gambar 2">
        <div class="card-body text-center">
          <h6 class="card-title">Gambar 2</h6>
          <button class="btn btn-danger btn-sm">
            <i class="fas fa-trash-alt"></i> Hapus
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
      </div>
    </div>
    <style>
    .image-list .card {
      transition: transform 0.2s;
    }
    .image-list .card:hover {
      transform: scale(1.02);
    }
    .image-list img {
      height: 150px;
      object-fit: cover;
    }
  </style>
   <script>
      const dropzone = document.getElementById('dropzone');
      const fileInput = document.getElementById('fileInput');
      const preview = document.getElementById('preview');
      
      // Klik area dropzone untuk memilih file
      dropzone.addEventListener('click', () => fileInput.click());
      
      // Saat file dipilih manual
      fileInput.addEventListener('change', handleFiles);
      
      // Drag over
      dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('dragover');
      });
      
      // Drag leave
      dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('dragover');
      });
      
      // Drop file
      dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('dragover');
        handleFiles(e.dataTransfer);
      });
      
      function handleFiles(data) {
        const files = data.files || fileInput.files;
        if (files.length > 0) {
          const file = files[0];
          if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
              preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded shadow" alt="Preview">`;
            }
            reader.readAsDataURL(file);
          } else {
            alert('Hanya file gambar yang diperbolehkan!');
          }
        }
      }
   </script>
</section>