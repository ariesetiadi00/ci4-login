<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>
<?php $i = 1 ?>
<div class="card px-3 w-75">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Name</th>
        </tr>
        <?php foreach ($member as $m) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $m['name'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?= $this->endSection(); ?>