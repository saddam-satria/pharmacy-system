<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <?= session()->getFlashdata('error'); ?>
    <?php endif; ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row ">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Patients (Summary)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sumPatients < 1 ? "Empty Patients" : $sumPatients; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Users (SUMMARY)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sumUsers < 1 ? "Empty Users" : $sumUsers ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Medicines (Summary)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sumMedicines < 1 ? "Empty Medicines" : $sumMedicines; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tablets fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>