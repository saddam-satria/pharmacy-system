<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>


<div class="mx-5">

    <?= $this->include('layouts/components/headerForm'); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('update-patients/' . $patients[0]['id']) ?>" method="POST">
                <div class="mb-1 text-danger text-capitalize " role="alert">

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <?= session()->getFlashdata('error'); ?>
                    <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
                        <?= session()->getFlashdata('success'); ?>
                    <?php endif;  ?>

                </div>
                <div class="mb-3">
                    <label for="patients-id" class="form-label">Patient ID</label>
                    <input value="<?= $patients[0]['id_patient']; ?>" type="text" name="patients-id" class="form-control" id="patients-id" aria-describedby="patients-id" readonly>
                </div>
                <div class="mb-3">
                    <label for="patients-name" class="form-label">Patient Name</label>
                    <input value="<?= $patients[0]['name']; ?>" type="text" name="patients-name" class="form-control" id="patients-name" aria-describedby="patients-name">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("patients-name"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="patients-age" class="form-label">Patient Age</label>
                    <input value="<?= $patients[0]['age']; ?>" type="text" name="patients-age" class="form-control" id="patients-age" aria-describedby="patients-age">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("patients-age"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="patients-address" class="form-label">Patient Address</label>
                    <input value="<?= $patients[0]['address']; ?>" type="text" name="patients-address" class="form-control" id="patients-address" aria-describedby="patients-address">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("patients-address"); ?>
                        <?php endif;  ?>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="patients-diseases" class="form-label">Patient Diseases</label>
                    <input value="<?= $patients[0]['diseases']; ?>" type="text" name="patients-diseases" class="form-control" id="patients-diseases" aria-describedby="patients-diseases">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("patients-diseases"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="last-visited" class="form-label">Last Visited</label>

                    <input value="<?= $patients[0]['last_visited']; ?>" type="date" name="last-visited" class="form-control" id="last-visited" aria-describedby="last-visited">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("last-visited"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="next-visited" class="form-label">Next Visited</label>
                    <input value="<?= $patients[0]['next_visited']; ?>" type="date" name="next-visited" class="form-control" id="next-visited">
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