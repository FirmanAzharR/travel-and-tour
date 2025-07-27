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


<?php echo form_open_multipart('mahasiswa/add_mahasiswa');?>

<h4>Tambah Mahasiswa</h4>
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
<div class="form-group">
    <label for="prodi" class="form-label">Prodi</label>
    <select name="prodi_id" id="prodi_id" class="form-control" required>
        <option value="">Pilih Program Studi</option>
        <?php foreach ($data_prodi as $prodi): ?>
        <option value="<?= $prodi->id ?>"><?= $prodi->prodi_name ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="foto" class="form-label">Foto</label>
    <input type="file" id="foto" class="form-control" name="foto" placeholder="Foto Mahasiswa" accept="image/*"
        required>
</div>
<div class="form-group">
    <label for="preview" class="form-label">Preview</label>
    <img src="" class="img-fluid rounded-top" alt="" width="200" id="preview" name="preview" />
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

//contoh manual dengan jQuery
// $(document).ready(function() {
//     $.ajax({
//         url: '<?= base_url('mahasiswa/get_prodi') ?>',
//         type: 'GET',
//         dataType: 'json',
//         success: function(response) {
//             var select = $('#prodi_id');
//             if (response && response.length > 0) {
//                 $.each(response, function(key, value) {
//                     select.append('<option value="' + value.id + '">' + value.prodi_name +
//                         '</option>');
//                 });
//             } else {
//                 select.html('<option value="">Tidak ada data prodi</option>');
//             }
//         },
//         error: function(xhr, status, error) {
//             console.error('Error:', error);
//             var select = $('#prodi_id');
//             select.html('<option value="">Error loading data prodi</option>');
//         }
//     });
// });
// 
</script>