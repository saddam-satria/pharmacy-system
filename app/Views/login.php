<?= $this->extend('layouts/main'); ?>



<?= $this->section('content'); ?>



<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <?= "<script>
                        Swal.fire(
                            'login success ',
                            '',
                            'success'
                        )
                        </script>"
                    ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                            </div>
                            <form class="user" action="<?= base_url('login'); ?>" method="POST">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                    <div class="mt-1 text-danger text-lowercase" role="alert">
                                        <?php if (!empty(session()->getFlashdata('error_email'))) : ?>
                                            <?= session()->getFlashdata('error_email'); ?>
                                        <?php endif;  ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    <div class="mt-1 text-danger text-lowercase" role="alert">
                                        <?php if (!empty(session()->getFlashdata('error_password'))) : ?>
                                            <?= session()->getFlashdata('error_password'); ?>
                                        <?php endif;  ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('forgot-password') ?>">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('register'); ?>">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<?= $this->endSection(); ?>