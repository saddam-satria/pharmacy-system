<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>


<div class="mx-5">

    <?= $this->include('layouts/components/headerForm'); ?>
    <div class="row">
        <div class="col-md-6">
            <form action="<?= base_url('add-patients') ?>" method="POST">
                <div class="mb-3">
                    <label for="patients-id" class="form-label">Patient ID</label>
                    <input disabled readonly type="text" name="patients-id" class="form-control" id="patients-id" aria-describedby="patients-id">
                </div>
                <div class="mb-3">
                    <label for="patients-name" class="form-label">Patient Name</label>
                    <input type="text" name="patients-name" class="form-control" id="patients-name" aria-describedby="patients-name">
                </div>

                <div class="mb-3">
                    <label for="patients-address" class="form-label">Patient Address</label>
                    <input type="text" name="patients-address" class="form-control" id="patients-address" aria-describedby="patients-address">
                </div>
                <div class="mb-3">
                    <label for="patients-diseases" class="form-label">Patient Diseases</label>
                    <input type="text" name="patients-diseases" class="form-control" id="patients-diseases" aria-describedby="patients-diseases">
                </div>

                <div class="mb-3">
                    <label for="last-visited" class="form-label">Last Visited</label>
                    <input type="date" name="last-visited" class="form-control" id="last-visited" aria-describedby="last-visited">
                </div>

                <div class="mb-3">
                    <label for="next-visited" class="form-label">Next Visited</label>
                    <input type="date" name="next-visited" class="form-control" id="next-visited">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>