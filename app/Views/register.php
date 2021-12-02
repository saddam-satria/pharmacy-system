<?= $this->extend('layouts/main'); ?>



<?= $this->section('content'); ?>



<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                            </div>
                            <form class="user" action="<?= base_url('register'); ?>" method="POST">
                                <div class="form-group">
                                    <input value="<?= set_value('name'); ?>" name="name" type="text" class="form-control form-control-user" placeholder="Name">
                                    <div class="mt-1 text-danger text-lowercase" role="alert">
                                        <?php if (isset($validation)) : ?>
                                            <?= $validation->getError("name"); ?>
                                        <?php endif;  ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input value="<?= set_value('email'); ?>" name="email" type="text" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Email Address">
                                    <div class="mt-1 text-danger text-lowercase" role="alert">
                                        <?php if (isset($validation)) : ?>
                                            <?= $validation->getError("email"); ?>
                                        <?php endif;  ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input value="<?= set_value('phone'); ?>" name="phone" type="text" class="form-control form-control-user" placeholder="Phone Number">
                                    <div class="mt-1 text-danger text-lowercase" role="alert">
                                        <?php if (isset($validation)) : ?>
                                            <?= $validation->getError("phone"); ?>
                                        <?php endif;  ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user" placeholder="Password">
                                    <div class="mt-1 text-danger text-lowercase" role="alert">
                                        <?php if (isset($validation)) : ?>
                                            <?= $validation->getError("password"); ?>
                                        <?php endif;  ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="confirm-password" type="password" class="form-control form-control-user" placeholder="Confirm Password">
                                    <div class="mt-1 text-danger text-lowercase" role="alert">
                                        <?php if (isset($validation)) : ?>
                                            <?= $validation->getError("confirm-password"); ?>
                                        <?php endif;  ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register
                                </button>
                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="<?= base_url("login"); ?>">Login Right Now !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<?= $this->endSection(); ?>