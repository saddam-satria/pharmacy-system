 <!-- Page Heading -->
 <div class="d-flex flex-row">
     <div>
         <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
         <p class="mb-4"><?= $title ?> data show off</p>
     </div>
     <div class="ml-auto my-auto">
         <a href="<?= base_url('generate-report/' . strtolower($title)) ?>" class="btn btn-primary btn-sm text-capitalize">generate report</a>
         <!-- conditional rendering -->
         <?php if ($title != "Users") : ?>
             <a href="<?= base_url('add-' . strtolower($title)); ?>" class="btn btn-primary btn-sm text-capitalize">Add <?= $title; ?></a>
         <?php endif ?>
     </div>
 </div>