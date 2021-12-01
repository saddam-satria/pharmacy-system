<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>


<div class="mx-5">
    <?php date_default_timezone_set("Asia/Jakarta") ?>
    <?= $this->include('layouts/components/headerForm'); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('add-medicines') ?>" method="POST">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <?= "<script>
                        Swal.fire(
                            'Somethings error',
                            '',
                            'error'
                        )
                        </script> "; ?>
                <?php endif;  ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <?= "<script>
                        Swal.fire(
                            'success create a new medicine',
                            '',
                            'success'
                        )
                        </script> "; ?>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="medicine-name" class="form-label">Medicine Name</label>
                    <input value="<?= set_value('medicine-name') ?>" type="text" name="medicine-name" class="form-control" id="medicine-name" aria-describedby="medicine-name">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("medicine-name"); ?>
                        <?php endif;  ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="medicine-stock" class="form-label">Medicine Stock</label>
                    <input value="<?= set_value('medicine-stock') ?>" type="text" name="medicine-stock" class="form-control" id="medicine-stock" aria-describedby="medicine-stock">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("medicine-stock"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="medicine-expiry" class="form-label">Medicine Expiry</label>
                    <input value="<?= set_value('medicine-expiry') ?>" type="date" name="medicine-expiry" class="form-control" id="medicine-expiry" aria-describedby="medicine-expiry">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("medicine-expiry"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="medicine-purpose" class="form-label">Medicine Purpose</label>
                    <input value="<?= set_value('medicine-purpose') ?>" type="text" name="medicine-purpose" class="form-control" id="medicine-purpose" aria-describedby="medicine-purpose">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("medicine-purpose"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="medicine-factory" class="form-label">Medicine Factory</label>
                    <input value="<?= set_value('medicine-factory') ?>" type="text" name="medicine-factory" class="form-control" id="medicine-factory" aria-describedby="medicine-factory">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("medicine-factory"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="created-at" class="form-label">Created At</label>
                    <input value="<?= date("Y-m-d H:i:s"); ?>" readonly type="text" name="created-at" class="form-control text-capitalize" id="created-at" aria-describedby="created-at">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>