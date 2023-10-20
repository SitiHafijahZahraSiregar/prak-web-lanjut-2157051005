<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mb-4">Form Update Data Mahasiswa/i</h1>
<div class="container">
<form action="<?= base_url('user/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?= $user['nama'] ?>" id="nama" class="form-control <?php if (session()->getFlashdata('error_nama')) echo 'is-invalid'; ?>">
            <?php if (session()->getFlashdata('error_nama')) : ?>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('error_nama') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="npm">NPM</label>
            <input type="text" name="npm" value="<?= $user['npm'] ?>" id="npm" class="form-control <?php if (session()->getFlashdata('error_npm')) echo 'is-invalid'; ?>">
            <?php if (session()->getFlashdata('error_npm')) : ?>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('error_npm') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <select class="form-select" name="kelas" aria-label="Default select example">
                <?php
                foreach ($kelas as $item) {
                ?>
                    <option value="<?= $item['id'] ?>" <?= $user['id_kelas'] == $item['id'] ? 'selected' : '' ?>>
                        <?= $item['nama_kelas'] ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="<?= $user['email'] ?>" id="email" class="form-control <?php if (session()->getFlashdata('error_email')) echo 'is-invalid'; ?>">
            <?php if (session()->getFlashdata('error_email')) : ?>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('error_email') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="int" name="no_hp" value="<?= $user['no_hp'] ?>" id="no_hp" class="form-control <?php if (session()->getFlashdata('error_no_hp')) echo 'is-invalid'; ?>">
            <?php if (session()->getFlashdata('error_no_hp')) : ?>
                <div class="invalid-feedback">
                    <?= session()->getFlashdata('error_no_hp') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <div class="col">
                <img src="<?= isset($user['foto']) ? $user['foto'] : base_url('assets/img/rawr.jpg') ?>" class="img-thumbnail" width="300px">
            </div>
            <div class="col">
                <label for="foto">Foto</label>
                <input type="file" value="<?= $user['foto'] ?>" class="form-control <?php if (session()->getFlashdata('error_foto')) echo 'is-invalid'; ?>" name="foto" aria-label="Default select example">
                <?php if (session()->getFlashdata('error_foto')) : ?>
                    <div class="invalid-feedback">
                        <?= session()->getFlashdata('error_foto') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <a href="/user" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <?= $this->endSection() ?>