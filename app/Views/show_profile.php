<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>


<div class="mx-5">

    <?= $this->include('layouts/components/headerForm'); ?>
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input disabled value="<?= $user['name'] ?>" type="text" name="name" class="form-control" id="name" aria-describedby="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input disabled value="<?= $user['email'] ?>" type="text" name="email" class="form-control" id="email" aria-describedby="email">
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input disabled value="<?= $user['phone_number'] ?>" type="text" name="phone_number" class="form-control" id="phone_number" aria-describedby="phone_number">
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role </label>
                    <input disabled value="<?= $user['role'] ?>" type="text" name="role" class="form-control" id="role" aria-describedby="role">
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>