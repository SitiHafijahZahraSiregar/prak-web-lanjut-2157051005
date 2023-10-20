<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mb-4">Form Update Data Kelas</h1>
<div class="container">
<form action="<?= base_url('kelas/' . $kelas['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama_kelas" value="<?= $kelas['nama_kelas'] ?>" id="nama_kelas" class="form-control <?php if (session()->getFlashdata('error_nama_kelas')) echo 'is-invalid'; ?>">
            <?php if (session()->getFlashdata('error_nama_kelas')) : ?>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('error_nama_kelas') ?>
                </div>
            <?php endif; ?>
        </div>
        <br>
        <a href="/kelas" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <?= $this->endSection() ?>