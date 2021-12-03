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

                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <?= session()->getFlashdata('success') ?>
                <?php elseif (!empty(session()->getFlashdata('error'))) : ?>
                    <?= session()->getFlashdata('error') ?>
                <?php endif; ?>

                <table class="table table-borderless table-hover table-light text-dark" id="table-datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Addres</th>
                            <th>Diseases</th>
                            <th>last_visited</th>
                            <th>next_visited</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (isset($patients)) : ?>
                            <?php foreach ($patients as $patient) : ?>
                                <tr>
                                    <td><?= $patient["id_patient"]; ?></td>
                                    <td><?= $patient["name"]; ?></td>
                                    <td><?= $patient["age"]; ?></td>
                                    <td><?= $patient["address"]; ?></td>
                                    <td><?= $patient["diseases"]; ?></td>
                                    <td><?= $patient["last_visited"]; ?></td>
                                    <td><?= $patient["next_visited"]; ?></td>
                                    <td>
                                        <a href="<?= base_url('remove-patients/' . $patient['id']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        <a href="<?= base_url('update-patients/' . $patient['id']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil"></i></a>
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