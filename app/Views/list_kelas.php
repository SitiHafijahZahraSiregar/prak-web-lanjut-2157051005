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
                            <a href="" class="btn btn-warning btn-sm mr-2">
                                <i class="fas fa-pencil"></i> Edit
                            </a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <!-- Modal for Delete Confirmation -->
                    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this user?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>