<?= $this->extend('layout/template_main'); ?>
<?= $this->section('content'); ?>
<?php $i = 1 ?>

<!-- <h1>Member</h1> -->
<div class="my-3">
    <a href="/member/create" class="btn btn-sm btn-primary">Add New Member</a>
</div>


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
        <th>Name</th>
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
            <td class="middle-div"><?= $i++ ?></td>
            <td class="middle-div"><?= $m['name'] ?></td>
            <!-- <td class="badge badge-success"> -->
            <td>
                <div class="btn btn-sm <?= ($data) ? 'btn-success' : 'btn-danger' ?>">
                    <?= date('F', mktime($time)) ?>
                </div>
            </td>
            <td class="middle-div">
                <a href="/member/get" class="detail-button btn btn-sm" data-toggle="modal" data-target="#detailMemberModal" data-id="<?= $m['id'] ?>">Detail</a>

                <a href="/member/edit/<?= $m['id'] ?>" class="edit-button btn btn-sm">Edit</a>

                <a href="/member/delete/<?= $m['id'] ?>" class="deleteButton btn btn-sm btn-danger" onclick="return confirm('Delete Member')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= $this->endSection(); ?>