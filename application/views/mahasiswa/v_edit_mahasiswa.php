<head>
    <!-- Flatpickr CSS for date picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<?php
    echo validation_errors('
    <div class="card bg-danger text-white shadow">
        <div class="card-body">
        <div class="text-white-50 small">','</div>
        </div>
    </div>');

    if (isset($error_upload)) {
        echo '<div class="alert alert-danger">'.$error_upload.'</div>';
    }
?>

<!-- Debug info -->
<div class="alert alert-info">
    <strong>Debug Info:</strong><br>
    ID Mahasiswa: <?= $data_mahasiswa->id ?><br>
    Nama: <?= $data_mahasiswa->nama ?><br>
    NIK: <?= $data_mahasiswa->nik ?><br>
    Prodi ID: <?= $data_mahasiswa->prodi_id ?><br>
    Prodi Name: <?= $data_mahasiswa->prodi_name ?><br>
    Image URL: <?= $data_mahasiswa->image_url ?><br>
    File Exists: <?= !empty($data_mahasiswa->image_url) && file_exists('./upload_images/'.$data_mahasiswa->image_url) ? 'Yes' : 'No' ?>
</div>

<h4><?= $title; ?></h4>
<?php echo form_open_multipart('mahasiswa/edit_mahasiswa/'.$data_mahasiswa->id);?>
<div class="form-group">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama"
        value="<?= $data_mahasiswa->nama ?>">
</div>
<div class="form-group">
    <label for="nik" class="form-label">NIK</label>
    <input type="text" class="form-control" id="nik" name="nik" aria-describedby="nik"
        value="<?= $data_mahasiswa->nik ?>">
    <div id="nik" class="form-text">input your nik correctly</div>
</div>
<div class="form-group">
    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
    <input type="date" id="datepicker" class="form-control" name="tgl_lahir" placeholder="Pilih tanggal"
        value="<?= $data_mahasiswa->tgl_lahir ?>">
</div>
<div class="form-group">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select class="form-control" aria-label="jenis_kelamin" name="jenis_kelamin">
        <option value="">Pilih Jenis Kelamin</option>
        <option value="L" <?= $data_mahasiswa->jenis_kelamin == 'L' ? 'selected' : '' ?>>Laki - Laki</option>
        <option value="P" <?= $data_mahasiswa->jenis_kelamin == 'P' ? 'selected' : '' ?>>Perempuan</option>
    </select>
</div>
<div class="form-group">
    <label for="prodi" class="form-label">Prodi</label>
    <select name="prodi_id" id="prodi_id" class="form-control" required>
        <option value="">Pilih Program Studi</option>
        <?php foreach ($data_prodi as $prodi): ?>
        <option value="<?= $prodi->id ?>" <?= $prodi->id == $data_mahasiswa->prodi_id ? 'selected' : '' ?>>
            <?= $prodi->prodi_name ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" id="foto" class="form-control" name="foto" placeholder="Foto Mahasiswa" accept="image/*">
</div>
<div class="form-group">
    <label for="preview" class="form-label">Preview</label>
    <?php if (!empty($data_mahasiswa->image_url) && file_exists('./upload_images/'.$data_mahasiswa->image_url)): ?>
        <img src="<?= base_url('upload_images/'.$data_mahasiswa->image_url) ?>" class="img-fluid rounded-top" alt=""
            width="200" id="preview" name="preview" />
    <?php else: ?>
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> Tidak ada gambar yang tersedia
        </div>
    <?php endif; ?>
</div>
<br>
<div class="from-group">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= base_url('mahasiswa/index') ?>" class="btn btn-danger">Kembali</a>
</div>

<?php echo form_close(); ?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
flatpickr("#datepicker", {
    dateFormat: "Y-m-d"
});

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$('#foto').change(function() {
    previewImage(this);
});
</script>