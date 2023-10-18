<?= $this->extend('layouts/app');?>
   <?= $this->section('content');?>
   <h1 class="text-center mb-4">Form Tambah Data Kelas</h1>
   <div class="container">
    <form action="<?=base_url('/kelas/store')?>" method="POST"  enctype="multipart/form-data">
  <div class="form-group">
    <br>
    <label for="nama">Nama</label>
    <input type="text" name="nama_kelas" class="form-control <?php if (session()->getFlashdata('error_nama_kelas')) echo 'is-invalid'; ?>" value="<?= old('nama_kelas'); ?>">
            <?php if (session()->getFlashdata('error_nama_kelas')) : ?>
              <div class="invalid-feedback">
                <?= session()->getFlashdata('error_nama_kelas') ?>
              </div>
            <?php endif; ?>
  </div>
  <br>
  <a href="/user" class="btn btn-warning">Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?= $this->endSection() ?>   