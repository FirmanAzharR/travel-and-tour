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
?>


<?php echo form_open('mahasiswa/add_mahasiswa');?>

<h4>Tambah Mahasiswa</h4>
<form>
    <div class="form-group">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama">
    </div>
    <div class="form-group">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" aria-describedby="nik">
        <div id="nik" class="form-text">input your nik correctly</div>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" id="datepicker" class="form-control" name="tgl_lahir" placeholder="Pilih tanggal">
    </div>
    <div class="form-group">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select class="form-control" aria-label="jenis_kelamin" name="jenis_kelamin">
            <option selected>Jenis Kelamin</option>
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="from-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?= base_url('mahasiswa/index') ?>" class="btn btn-danger">Kembali</a>
    </div>

</form>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
flatpickr("#datepicker", {
    dateFormat: "Y-m-d"
});
</script>