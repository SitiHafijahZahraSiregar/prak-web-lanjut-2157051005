<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mb-4">Data Mahasiswa/i</h1>
<div class="container mt-5">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" id="myAlert" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            <strong><?= session()->getFlashdata('pesan'); ?></strong>
        </div>
    <?php endif; ?>
    <a href="<?= base_url('/user/create'); ?>" class="btn btn-primary mb-3"><i class="fas fa-user-plus mr-2"></i> Create User</a>
    <div class="table-responsive">
        <table class="table rounded-table">
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
                        <td>
                            <a href="<?= base_url('user/detail/'. $u['id']); ?>" class="btn btn-success btn-sm mr-2">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="<?= base_url('user/'. $u['id'] . '/edit'); ?>" class="btn btn-warning btn-sm mr-2">
                                <i class="fas fa-pencil"></i> Edit
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm mr-2 delete-button" data-url="<?= base_url('user/' . $u['id']) ?>"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
