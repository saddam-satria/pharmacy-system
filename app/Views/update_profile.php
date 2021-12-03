<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>


<div class="mx-5">

    <?= $this->include('layouts/components/headerForm'); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('user-page/show-profile/' . $user['id']) ?>" method="POST">

                <div class="mb-1 text-danger text-capitalize " role="alert">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <?= session()->getFlashdata('error'); ?>
                    <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
                        <?= session()->getFlashdata('success'); ?>
                    <?php endif;  ?>
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="<?= $user['name'] ?>" type="text" name="name" class="form-control" id="name" aria-describedby="name">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("name"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="<?= $user['email'] ?>" type="text" name="email" class="form-control" id="email" aria-describedby="email">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("email"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input value="<?= $user['phone_number'] ?>" type="text" name="phone_number" class="form-control" id="phone_number" aria-describedby="phone_number">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("phone_number"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role </label>
                    <input readonly value="<?= $user['role'] ?>" type="text" name="role" class="form-control" id="role" aria-describedby="role">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("role"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>