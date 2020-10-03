<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>

<!-- <h1>Dashboard</h1> -->

<table class="table">
    <tr>
        <th>
            <i class="fas fa-money-check-alt"></i>
            Harga (Rp)
        </th>
        <th>
            <i class="fas fa-users"></i>
            Jumlah Member
        </th>
        <th>
            <i class="fas fa-venus"></i>
            Member Wanita
        </th>
        <th>
            <i class="fas fa-mars"></i>
            Member Pria
        </th>
    </tr>
    <tr>
        <td>
            <button id="price-button" type="button" data-price="<?= $price[0]['price'] ?>" data-id="<?= $price[0]['id'] ?>" class="btn" data-toggle="modal" data-target="#priceModal">
                <h2><?= number_format($price[0]['price'], 0) ?></h2>
            </button>
        </td>
        <td>
            <button id="total-button" type="button" class="btn" data-toggle="modal" data-target="#memberDetailModal">
                <h2><?= count($member[0]) ?></h2>
            </button>
        </td>
        <td>
            <button id="female-button" type="button" class="btn" data-toggle="modal" data-target="#memberDetailModal">
                <h2><?= count($member[1]) ?></h2>
            </button>
        </td>
        <td>
            <button id="male-button" type="button" class="btn" data-toggle="modal" data-target="#memberDetailModal">
                <h2><?= count($member[2]) ?></h2>
            </button>
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
    Riwayat Pembayaran
</div>

<table class="table">
    <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach ($payment as $p) : ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $p['name'] ?></td>
            <td>Pembayaran Bulan <?= date('F', mktime(0, 0, 0, $p['month'])) ?></td>
            <td><?= date("j F Y - g:i a", strtotime($p['created_at'])) ?></td>
            <td>Rp. <?= number_format($p['amount'], 2) ?>
            <td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- ===================================================================== -->

<!-- Price Modal -->
<div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="priceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="priceModalLabel">Change Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="price-modal-body">
                <!-- Start Body -->
                <div class="container pt-3">
                    <div class="row">
                        <div class="col">
                            <form action="/payment/price" method="POST">

                                <!-- Send hidden ID to Update -->
                                <input id="price-id" type="hidden" name="price-id" value="">

                                <!-- Old Price -->
                                <div class="form-group">
                                    <label for="old-price">Current Price</label>
                                    <input name="old-price" type="text" class="form-control" id="old-price" disabled>
                                </div>

                                <!-- New Price -->
                                <div class="form-group">
                                    <label for="new-price">New Price</label>
                                    <input name="new-price" type="text" class="form-control" id="new-price">
                                </div>
                        </div>
                    </div>


                    <!-- End Body -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ===================================================================== -->

<!-- Member Count Modal -->
<div class="modal fade" id="memberDetailModal" tabindex="-1" aria-labelledby="memberDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberDetailModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="memberDetail" class="table">

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>