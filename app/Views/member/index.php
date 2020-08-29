<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>
<?php $i = 1 ?>
<h1>Member</h1>
<table class="table">
    <tr>
        <th>#</th>
        <th>Name</th>
    </tr>
    <?php foreach ($member as $m) : ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $m['name'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection(); ?>