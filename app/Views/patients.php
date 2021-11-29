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
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>Addres</th>
                            <th>Diseases</th>
                            <th>last_visited</th>
                            <th>next_visited</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($patients as $patient) : ?>
                            <tr>
                                <td><?= $patient->id_patients; ?></td>
                                <td><?= $patient->name; ?></td>
                                <td><?= $patient->address; ?></td>
                                <td><?= $patient->diseases; ?></td>
                                <td><?= $patient->last_visited; ?></td>
                                <td><?= $patient->next_visited; ?></td>
                                <td>
                                    <?= $this->include('layouts/components/actionButton'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

<?= $this->endSection(); ?>