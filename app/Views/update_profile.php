<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>


<div class="mx-5">

    <?= $this->include('layouts/components/headerForm'); ?>
    <div class="row">
        <div class="col-md-6">
            <form class="text-capitalize" enctype="multipart/form-data" accept-charset="utf-8" action="<?= base_url('user-page/update-profile/' . $user['id']) ?>" method="POST">

                <div class="mb-1 text-danger text-capitalize " role="alert">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <?= session()->getFlashdata('error'); ?>
                    <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
                        <?= session()->getFlashdata('success'); ?>
                    <?php endif;  ?>
                </div>

                <img src="<?= base_url('image-profile/' . $user['image_profile']) ?>" width="180" height="180" class="img rounded mb-3" alt="">

                <div class="mb-3">
                    <input value="<? set_value('image-profile'); ?>" type="file" name="image-profile" id="image-profile" aria-describedby="image-profile">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("image-profile"); ?>
                        <?php endif;  ?>
                    </div>
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
                    <input value="<?= $user['phone_number'] ?>" type="text" name="phone" class="form-control" id="phone_number" aria-describedby="phone_number">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("phone"); ?>
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

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("password"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm New Password</label>
                    <input type="password" name="confirm-password" class="form-control" id="confirm-password" aria-describedby="confirm-password">
                    <div class="mt-1 text-danger text-lowercase" role="alert">
                        <?php if (isset($validation)) : ?>
                            <?= $validation->getError("confirm-password"); ?>
                        <?php endif;  ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>