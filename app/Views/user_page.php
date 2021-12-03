<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('content-dashboard'); ?>

<?php if (!empty(session()->getFlashdata('error'))) : ?>
    <?= session()->getFlashdata('error'); ?>
<?php endif; ?>
<h1><?= $title ?></h1>

<?= $this->endSection(); ?>