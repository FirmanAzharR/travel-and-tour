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

<?php if ($this->session->flashdata('error')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('error') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif ?>
<br>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Prodi</th>
                <th>Foto</th>
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
                ?>
                </td>
                <td><?= $value->prodi_name ?></td>
                <td>
                    <?php if (!empty($value->image_url) && file_exists('./upload_images/'.$value->image_url)): ?>
                        <img src="<?= base_url('upload_images/'.$value->image_url) ?>" width="75px" alt="Foto <?= $value->nama ?>">
                    <?php else: ?>
                        <span class="text-muted">Tidak ada foto</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url('mahasiswa/edit_mahasiswa/'.$value->id) ?>"
                        class="btn btn-warning btn-sm">Edit (ID: <?= $value->id ?>)</a>
                    <a href="<?= base_url('mahasiswa/delete_mahasiswa/'.$value->id) ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                        class="btn btn-danger btn-sm">Delete</a>
                    <?php if (!empty($value->image_url)): ?>
                        <br><small class="text-muted">File: <?= $value->image_url ?></small>
                    <?php endif; ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
