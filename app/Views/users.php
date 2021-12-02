<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->include('layouts/components/headerTable') ?>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data <?= $title ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-hover table-light text-dark" id="table-datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (isset($users)) : ?>
                            <?php foreach ($users as $key => $user) : ?>
                                <?php $key = $key + 1 ?>
                                <tr>
                                    <td><?= $key++ ?></td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['phone_number'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

<?= $this->endSection(); ?>