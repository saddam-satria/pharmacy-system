<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->include('layouts/components/headerTable') ?>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?> Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-hover table-light text-dark" id="table-datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Medicine ID</th>
                            <th>Medicine Name</th>
                            <th>Medicine Stock</th>
                            <th>Medicine Expiry</th>
                            <th>Medicine Purpose</th>
                            <th>Medicine Factory</th>
                            <th>Created At</th>
                            <th>Last Update</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php if (isset($medicines)) : ?>
                            <?php foreach ($medicines as $medicine) : ?>
                                <tr>
                                    <td><?= $medicine['medicine_id'] ?></td>
                                    <td><?= $medicine['medicine_name'] ?></td>
                                    <td><?= $medicine['medicine_stock'] ?></td>
                                    <td><?= $medicine['medicine_expiry'] ?></td>
                                    <td><?= $medicine['medicine_purpose'] ?></td>
                                    <td><?= $medicine['medicine_factory'] ?></td>
                                    <td><?= $medicine['created_at'] ?></td>
                                    <td><?= empty($medicine['updated_at']) ? "Not Updated" : $medicine['updated_at'] ?></td>
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