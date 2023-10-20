<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<h1 class="text-center mb-4">Data Kelas</h1>
<div class="container mt-5">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" id="myAlert" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            <strong><?= session()->getFlashdata('pesan'); ?></strong>
        </div>
    <?php endif; ?>
    <a href="<?= base_url('/kelas/create'); ?>" class="btn btn-primary mb-3"><i class="fas fa-user-plus mr-2"></i> Create Kelas</a>
    <div class="table-responsive">
        <table class="table rounded-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kelas as $k) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $k['nama_kelas']; ?></td>
                        <td>
                            <a href="<?= base_url('kelas/'. $k['id'] . '/edit'); ?>" class="btn btn-warning btn-sm mr-2">
                                <i class="fas fa-pencil"></i> Edit
                            </a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm mr-2 delete-button" data-url="<?= base_url('kelas/' . $k['id']) ?>"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>                   
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>