<?= $this->extend('layout/template_user'); ?>

<?= $this->section('content'); ?>
<?php $i = 1 ?>
<table>
    <tr>
        <td>No</td>
        <td>Name</td>
    </tr>
    <?php foreach ($member as $m) : ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $m['name'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection(); ?>