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
            <button type="button" class="btn" data-toggle="modal" data-target="#priceModal">
                <h2><?= number_format($price[0]['price'], 0) ?></h2>
            </button>
        </td>
        <td>
            <h2><?= count($member[0]) ?></h2>
        </td>
        <td>
            <h2><?= count($member[1]) ?></h2>
        </td>
        <td>
            <h2><?= count($member[2]) ?></h2>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

<div class=" text-center mb-3">
    <i class="fas fa-list-alt"></i>
    Payment History
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
            <td>Payment in <?= date('F', mktime(0, 0, 0, $p['month'])) ?></td>
            <td><?= date("j F Y - g:i a", strtotime($p['created_at'])) ?></td>
            <td>Rp. <?= number_format($p['amount'], 2) ?>
            <td>
        </tr>
    <?php endforeach; ?>
</table>



<!-- ==================================================================================================
================================================================================================== -->


<!-- Modal -->
<div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="priceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="priceModalLabel">Change Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-block">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>