<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>
<h1>Dashboard</h1>

<h6 class="text-center">Payment History</h6>

<table class="table">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Paid at</th>
        <th>Amount</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach ($payment as $p) : ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $p['name'] ?></td>
            <td>Payment in <?= date('F', mktime($p['month'])) ?></td>
            <td><?= date("j F Y - g:i a", strtotime($p['created_at'])) ?></td>
            <td>Rp. <?= number_format($p['amount'], 2) ?>
            <td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection(); ?>