<?= $this->extend('layout/template_main'); ?>
<?= $this->section('content'); ?>
<?php

use App\Controllers\Member;

$i = 1
?>

<!-- <h1>Member</h1> -->
<!-- <div class="my-3">
    <a href="/member/create" class="btn btn-primary btn-block btn-sm ">Tambah Member</a>
</div> -->

<!-- Message -->
<?php if (session()->getFlashData('strong') != null) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashData('strong') ?></strong> <?= session()->getFlashData('message') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<!-- End Message -->

<!-- Table Header -->
<table class="table member">
    <tr>
        <th>#</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>Status</th>
        <th></th>
    </tr>

    <!-- variable data to check payment status -->
    <?php $data = 1; ?>
    <?php foreach ($member as $m) : ?>

        <!-- Get payment data per member -->
        <?php

        $id = $m['id'];

        // Select this member on today's month.
        // If 1 => Paid // If 0 => Not Paid
        $query = "SELECT * FROM member
                INNER JOIN member_payment
                ON member.id = member_payment.member_id
                WHERE member.id = $id
                AND member_payment.month = $time";
        $data = $db->query($query)->getResultArray();
        ?>

        <tr>
            <!-- No -->
            <td class="middle-div"><?= $i++ ?></td>
            <!-- Foto -->
            <td class="middle-div"><img class="rounded-circle" width="30" src="/img/profile/<?= $m['image'] ?>" alt="Profile"></td>
            <!-- Nama -->
            <td class="middle-div"><?= $m['name'] ?></td>
            <!-- Umur -->
            <td class="middle-div"><?= Member::countAge($m['birth_date']) ?></td>
            <!-- Alamat -->
            <td class="middle-div"><?= $m['address'] ?></td>

            <!-- Status -->
            <td>
                <div class="btn btn-sm <?= ($data) ? 'btn-success' : 'btn-danger' ?>">
                    <?= date('F', mktime($time)) ?>
                </div>
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- Detail -->
                        <a href="/member/detail/<?= $m['id'] ?>" class="dropdown-item detail-button btn btn-sm" data-id="<?= $m['id'] ?>">Detail</a>
                        <!-- Ubah -->
                        <a href="/member/edit/<?= $m['id'] ?>" class="dropdown-item edit-button btn btn-sm">Ubah</a>
                        <!-- Hapus -->
                        <a id="delete-button" href="/member/delete/<?= $m['id'] ?>" class="dropdown-item delete-button btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-mid="<?= $m['id'] ?>">Hapus</a>
                    </div>
                </div>
            </td>
            <!-- Drop Down MEnu -->

        </tr>
    <?php endforeach; ?>
</table>

<!-- =================================================================== -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Data Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form id="delete-form" action="/member/delete" method="POST">

                                <!-- Hidden input for id -->
                                <input id="delete-id" name="delete-id" type="hidden">

                                <!-- Delete Payment Checkbox -->
                                <div class="custom-control custom-checkbox">
                                    <input name="delete-check" type="checkbox" class="custom-control-input" id="delete-check">
                                    <label class="custom-control-label" for="delete-check">Hapus riwayat pembayaran</label>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">OK</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>