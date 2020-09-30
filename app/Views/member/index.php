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
                <a href="/member/detail/<?= $m['id'] ?>" class="detail-button btn btn-sm" data-id="<?= $m['id'] ?>">Detail</a>

                <a href="/member/edit/<?= $m['id'] ?>" class="edit-button btn btn-sm">Edit</a>

                <a id="delete-button" href="/member/delete/<?= $m['id'] ?>" class="delete-button btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-mid="<?= $m['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- =================================================================== -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <<<<<<< HEAD <div class="row text-center">
                        <div class="col mb-3">
                            <h2 class="member-name">Arie Setiadi</h2>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 text-center p-2">
                        <img class="member-image w-75 rounded-circle c-shadow" src="/img/profile/d-male.png" alt="Profile">
                    </div>
                    <div class="member-desc col-lg-8 text-center p-2 align-self-center">
                        <h5>Member Detail</h5>
                        <h5>Member Detail</h5>
                        <h5>Member Detail</h5>
                        <h5>Member Detail</h5>
                        <h5>Member Detail</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <form class="pay" action="/payment/" method="post">
                            <input class="id" type="hidden" name="id">
                            <button class="btn btn-block btn-success <?= (!$data) ? 'disabled' : '' ?>" type="submit" id="pay" name="pay" onclick='return confirm("Confirm payment from this member")'>
                                Confirm Payment
                            </button>
                        </form>
                    </div>
                </div>
                <hr>
                =======
                >>>>>>> 1f86696822b9e7a604071d46f2b8658323a19d9e
                <div class="row">
                    <div class="col">
                        <form id="delete-form" action="/member/delete" method="POST">

                            <!-- Hidden input for id -->
                            <input id="delete-id" name="delete-id" type="hidden">

                            <!-- Delete Payment Checkbox -->
                            <div class="custom-control custom-checkbox">
                                <input name="delete-check" type="checkbox" class="custom-control-input" id="delete-check">
                                <label class="custom-control-label" for="delete-check">Delete member payment history</label>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">OK</button>
            </form>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>