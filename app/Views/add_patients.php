<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>


<div class="mx-5">

    <?= $this->include('layouts/components/headerForm'); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('add-patients') ?>" method="POST">
                <div class="mb-1 text-danger text-capitalize " role="alert">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <?= "<script>
                        Swal.fire(
                            'Somethings error',
                            '',
                            'error'
                        )
                        </script> "; ?>
                    <?php endif;  ?>
                </div>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <?= "<script>
                        Swal.fire(
                            'success create a new patient',
                            '',
                            'success'
                        )
                        </script> "; ?>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="patients-name" class="form-label">Patient Name</label>
                    <input value="<?= set_value('patients-name'); ?>" type="text" name="patients-name" class="form-control" id="patients-name" aria-describedby="patients-name">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("patients-name"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="patients-age" class="form-label">Patient Age</label>
                    <input value="<?= set_value('patients-age'); ?>" type="text" name="patients-age" class="form-control" id="patients-age" aria-describedby="patients-age">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("patients-age"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="patients-address" class="form-label">Patient Address</label>
                    <input value="<?= set_value('patients-address'); ?>" type="text" name="patients-address" class="form-control" id="patients-address" aria-describedby="patients-address">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("patients-address"); ?>
                        <?php endif;  ?>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="patients-diseases" class="form-label">Patient Diseases</label>
                    <input value="<?= set_value('patients-diseases'); ?>" type="text" name="patients-diseases" class="form-control" id="patients-diseases" aria-describedby="patients-diseases">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("patients-diseases"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="last-visited" class="form-label">Last Visited</label>

                    <input value="<?= set_value('last-visited'); ?>" type="date" name="last-visited" class="form-control" id="last-visited" aria-describedby="last-visited">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("last-visited"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="next-visited" class="form-label">Next Visited</label>
                    <input value="<?= set_value('next-visited'); ?>" type="date" name="next-visited" class="form-control" id="next-visited">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("next-visited"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>