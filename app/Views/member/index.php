<?= $this->extend('layout/template_main'); ?>
<?= $this->section('content'); ?>
<?php $i = 1 ?>
<h1>Member</h1>
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
    <?php foreach ($member as $m) : ?>
        <tr>
            <td class="middle-div"><?= $i++ ?></td>
            <td class="middle-div"><?= $m['name'] ?></td>
            <!-- <td class="badge badge-success"> -->
            <td class="middle-div">
                <?= date('F', mktime($time)) ?>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberLabel">Add New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                <form action="/member/create" method="POST" class="user">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required autocomplete="off" ">
                    </div>
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
                            <form action="/payment/" method="post">
                                <button class="btn btn-block btn-success" type="submit" id="pay" name="pay">Confirm Payment</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6 class="text-center">Payment History</h6>
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Date Time</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Payment in June</td>
                                    <td>29 June 2020</td>
                                    <td>Rp. 400.000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Payment in July</td>
                                    <td>29 July 2020</td>
                                    <td>Rp. 400.000</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Payment in August</td>
                                    <td>29 June 2020</td>
                                    <td>Rp. 400.000</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Payment in September</td>
                                    <td>29 September 2020</td>
                                    <td>Rp. 400.000</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Payment in October</td>
                                    <td>29 October 2020</td>
                                    <td>Rp. 400.000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>