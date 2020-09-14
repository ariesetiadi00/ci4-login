<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>
<div>
    <h1>Menu Management</h1>
    <button type="button" class="btn btn-primary w-25 my-2 add-button" data-toggle="modal" data-target="#menuModal">
        Add New Menu
    </button>
</div>

<!-- Button trigger modal -->

<!-- Message -->
<?php if (session()->getFlashData('strong') != null) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashData('strong') ?></strong> <?= session()->getFlashData('message') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<!-- End Maessage -->

<!-- Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                <form action="/menu/add" method="POST" class="user">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="Menu Name" required autocomplete="off" ">
                    </div>
                    <div class=" modal-footer">
                        <button id="menuButton" type="submit" class="btn btn-primary btn-block">
                            Submit
                        </button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>

<table class="table my-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Menu</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <?php $i = 1 ?>
    <?php foreach ($menu as $m) : ?>
        <tbody>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><?= $m['menu'] ?></td>
                <td>
                    <a href="/menu/edit/<?= $m['id'] ?>" data-toggle="modal" data-target="#menuModal" class="btn edit-button" data-id="<?= $m['id'] ?>">Edit</a>
                    <a href="/menu/delete/<?= $m['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete this menu ?')">Delete</a>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
<?= $this->endSection(); ?>