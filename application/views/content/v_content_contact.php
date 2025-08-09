<section id="konten-kontak" >
    <h4 class="mb-3">Form Kontak & Sosial Media</h4>
    <hr>
    <form action="simpan.php" method="POST">
        <div class="row">
            <!-- WhatsApp -->
            <div class="form-group col-md-6">
                <label for="whatsapp">WhatsApp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Contoh: 628123456789">
            </div>

            <!-- Email -->
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Contoh: email@example.com">
            </div>
        </div>

        <div class="row">
            <!-- Alamat -->
            <div class="form-group col-md-12">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
            </div>
        </div>

        <hr>

        <div class="row">
            <!-- Facebook -->
            <div class="form-group col-md-6">
                <label for="facebook">Facebook</label>
                <input type="url" class="form-control" id="facebook" name="facebook" placeholder="https://facebook.com/username">
            </div>

            <!-- Instagram -->
            <div class="form-group col-md-6">
                <label for="instagram">Instagram</label>
                <input type="url" class="form-control" id="instagram" name="instagram" placeholder="https://instagram.com/username">
            </div>
        </div>

        <div class="row">
            <!-- Twitter -->
            <div class="form-group col-md-6">
                <label for="twitter">Twitter</label>
                <input type="url" class="form-control" id="twitter" name="twitter" placeholder="https://twitter.com/username">
            </div>

            <!-- TikTok -->
            <div class="form-group col-md-6">
                <label for="tiktok">TikTok</label>
                <input type="url" class="form-control" id="tiktok" name="tiktok" placeholder="https://www.tiktok.com/@username">
            </div>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</section>
