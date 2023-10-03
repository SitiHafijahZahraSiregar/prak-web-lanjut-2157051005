   <?= $this->extend('layouts/app');?>
   <?= $this->section('content');?>
   <h1 class="text-center mb-4">Form Tambah Data Mahasiswa/i</h1>
   <div class="container">
    <form action="<?=base_url('/user/store')?>" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <br>
    <label for="nama">Nama</label>
    <input type="text" name="nama" class="form-control <?php if (session()->getFlashdata('error_nama')) echo 'is-invalid'; ?>" value="<?= old('nama'); ?>">
            <?php if (session()->getFlashdata('error_nama')) : ?>
              <div class="invalid-feedback">
                <?= session()->getFlashdata('error_nama') ?>
              </div>
            <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="npm">NPM</label>
    <input type="text" name="npm" class="form-control <?php if (session()->getFlashdata('error_npm')) echo 'is-invalid'; ?>" value="<?= old('npm'); ?>">
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
    foreach ($kelas as $item){
      ?>
  <option value="<?= $item['id']?>"><?=$item['nama_kelas']?></option>
  <?php
  }
  ?>
  </select>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control <?php if (session()->getFlashdata('error_email')) echo 'is-invalid'; ?>" value="<?= old('email'); ?>">
            <?php if (session()->getFlashdata('error_email')) : ?>
              <div class="invalid-feedback">
                <?= session()->getFlashdata('error_email') ?>
              </div>
            <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="no_hp">No HP</label>
    <input type="int" name="no_hp" class="form-control <?php if (session()->getFlashdata('error_no_hp')) echo 'is-invalid'; ?>" value="<?= old('no_hp'); ?>">
            <?php if (session()->getFlashdata('error_no_hp')) : ?>
              <div class="invalid-feedback">
                <?= session()->getFlashdata('error_no_hp') ?>
              </div>
            <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" class="form-control <?php if (session()->getFlashdata('error_foto')) echo 'is-invalid'; ?>"  name="foto" aria-label="Default select example">
    <?php if (session()->getFlashdata('error_foto')) : ?>
              <div class="invalid-feedback">
                <?= session()->getFlashdata('error_foto') ?>
              </div>
            <?php endif; ?>
  </input>
  </div>
  <br>
  <a href="/user" class="btn btn-warning">Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= $this->endSection() ?>    