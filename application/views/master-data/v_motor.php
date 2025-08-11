<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Input Data Mobil</h4>
        </div>
        <div class="card-body">
            <form id="carForm">
                <!-- Name -->
                <div class="form-group">
                    <label for="name">Nama Motor</label>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan nama mobil" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Masukkan deskripsi mobil" required></textarea>
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="image">Gambar Mobil</label>
                    <input type="file" class="form-control-file" id="image" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan Data</button>
            </form>
        </div>
    </div>
</div>