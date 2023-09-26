<?= $this->extend('layouts/app');?>
<?= $this->section('content');?>
<div class="col">
        <div class="row">
            <div class="container">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" id="myAlert" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif ?>
                <table class="table table-striped">
                    <h1 class="mt-3">Data Mahasiswa/i</h1>
                    <a href="<?= base_url('/user/create') ?>" class="btn btn-primary">Create User</a>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Kelas</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $u['nama']; ?></td>
                                <td><?= $u['npm']; ?></td>
                                <td><?= $u['nama_kelas']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td><?= $u['no_hp']; ?></td>
                                <td><a href="/user/detail/<?= $u['npm']; ?>" class="btn btn-success"> Detail</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>   