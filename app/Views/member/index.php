<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>
<?php $i = 1 ?>
<h1>Member</h1>
<div class="my-3">
    <a href="/member/create" class="addButton btn btn-primary" data-toggle="modal" data-target="#memberModal">Add New Member</a>
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

<table class="table">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($member as $m) : ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $m['name'] ?></td>
            <td>
                <a href="/member/edit" class="editButton btn" data-toggle="modal" data-target="#memberModal" data-id="<?= $m['id'] ?>">Edit</a>
                <a href="/member/delete/<?= $m['id'] ?>" class="deleteButton btn btn-danger" onclick="return confirm('Delete Member')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>




<!-- Modal -->
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

<!-- Bootstrap core JavaScript-->
<!-- <script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/memberScript.js"></script> -->
<?= $this->endSection(); ?>