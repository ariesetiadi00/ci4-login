<?= $this->extend('layout/template_main'); ?>
<?= $this->section('content'); ?>
<?php $i = 1 ?>
<!-- <h1>Member</h1> -->
<div class="my-3">
    <a href="/member/create" class="add-button btn btn-sm btn-primary" data-toggle="modal" data-target="#memberModal">Add New Member</a>
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

<table class="table member">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Status</th>
        <th></th>
    </tr>
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

                <a href="/member/edit" class="edit-button btn btn-sm" data-toggle="modal" data-target="#memberModal" data-id="<?= $m['id'] ?>">Edit</a>

                <a href="/member/delete/<?= $m['id'] ?>" class="deleteButton btn btn-sm btn-danger" onclick="return confirm('Delete Member')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>




<!-- Member Insert and Update Modal-->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="memberLabel">Add New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Start Form -->
                <form action="/member/create" method="POST" class="user">

                    <!-- ID place holder for javascript -->
                    <input type="hidden" id="id" name="id">

                    <table class="table table-borderless">
                        <!-- Image -->
                        <tr>
                            <td>Profile Image</td>
                            <td>:</td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="image" id="image" placeholder="Image" required autocomplete="off">
                                </div>
                            </td>
                        </tr>

                        <!-- Name -->
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <div class=" form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Insert Member Name" required autocomplete="off">
                                </div>
                            </td>
                        </tr>
                        <!-- Address -->
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                <div class=" form-group">
                                    <input type=" text" class="form-control" name="address" id="address" placeholder="Address" required autocomplete="off">
                                </div>
                            </td>
                        </tr>
                        <!-- Birth Place -->
                        <tr>
                            <td>Place of Birth</td>
                            <td>:</td>
                            <td>
                                <div class=" form-group">
                                    <input type=" text" class="form-control" name="birth_place" id="birth_place" placeholder="Place of birth" required autocomplete="off">
                                </div>
                            </td>
                        </tr>
                        <!-- Birth Date -->
                        <tr>
                            <td>Date of Birth</td>
                            <td>:</td>
                            <td>
                                <div class=" form-group">
                                    <input type="text" class="form-control" name="birth_date" id="birth_date" placeholder="Date of birth" required autocomplete="off" onmouseover="(this.type = 'date')">
                                </div>
                            </td>
                        </tr>
                        <!-- Religion -->
                        <tr>
                            <td>Religion</td>
                            <td>:</td>
                            <td>
                                <div class=" form-group">
                                    <select class="custom-select" name="religion" id="religion">
                                        <option hidden selected>Member Religion</option>
                                        <option value="islam">Islam</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="protestan">Protestan</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="buddha">Buddha</option>
                                        <option value="khonghucu">Khonghucu</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <!-- Phone -->
                        <tr>
                            <td>Phone Number</td>
                            <td>:</td>
                            <td>
                                <div class=" form-group">
                                    <input type=" text" class="form-control" name="phone" id="phone" placeholder="Phone number" required autocomplete="off">
                                </div>
                            </td>
                        </tr>
                        <!-- Gender -->
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td>
                                <div class=" form-group d-flex justify-content-start">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="m" checked>
                                        <label class="form-check-label" for="gender1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block mx-4">
                                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="f">
                                        <label class="form-check-label" for="gender2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>


                    <div class=" modal-footer">
                        <button id="memberButton" type="submit" class="btn btn-primary btn-block">
                            Submit
                        </button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>

<!-- Get Member Detail Modal -->
<div class="modal fade" id="detailMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row text-center">
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

                                <button class="confirm-button btn btn-block btn-success" type="submit" id="pay" name="pay" onclick='return confirm("Confirm payment from this member ?")'>
                                    Confirm Payment
                                </button>

                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6 class="text-center">Payment History</h6>
                            <table class="table payment-history">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>