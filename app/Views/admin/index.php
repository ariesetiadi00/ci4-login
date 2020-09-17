<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>

<!-- <h1>Dashboard</h1> -->

<table class="table">
    <tr>
        <th>
            <i class="fas fa-money-check-alt"></i>
            Current Price (Rp)
        </th>
        <th>
            <i class="fas fa-users"></i>
            Total Member
        </th>
        <th>
            <i class="fas fa-venus"></i>
            Female Member
        </th>
        <th>
            <i class="fas fa-mars"></i>
            Male Member
        </th>
    </tr>
    <tr>
        <td>
            <h2>400.000</h2>
        </td>
        <td>
            <h2>15</h2>
        </td>
        <td>
            <h2>6</h2>
        </td>
        <td>
            <h2>9</h2>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<div class="text-center mb-3">
    <i class="fas fa-list-alt"></i>
    Payment History
    <!-- <span class="text-center">Payment History</span> -->
</div>

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