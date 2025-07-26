<div class="d-flex justify-content-end align-items-center">
    <a href="<?= base_url('mahasiswa/add_mahasiswa') ?>" class="btn btn-primary ml-3">Tambah Data</a>
</div>
<br><br>
<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('success') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif ?>
<br>
<table class="table table-bordered" id="dataTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Tgl Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($data_mahasiswa as $key => $value) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value->nama ?></td>
            <td><?= $value->nik ?></td>
            <td><?= $value->tgl_lahir ?>, <?= date('d M Y', strtotime($value->tgl_lahir)) ?></td>
            <td><?php 
                    if($value->jenis_kelamin == 'L') {
                        echo 'Laki-laki';
                    } else {
                        echo 'Perempuan';
                    }
                ?></td>
            <td>
                <a href="<?= base_url('mahasiswa/edit_mahasiswa/'.$value->id) ?>"
                    class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('mahasiswa/delete_mahasiswa/'.$value->id) ?>"
                    onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>

<!-- Initialize DataTable manually because demo/datatables-demo.js not loaded properly on v_template-->
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>