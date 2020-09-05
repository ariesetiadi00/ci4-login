<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>
<div>
    <h1>Menu Management</h1>
    <button type="button" class="btn btn-primary w-25 my-2" data-toggle="modal" data-target="#exampleModal">
        Add New Menu
    </button>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                <form action="/menu/add" method="POST" class="user">
                    <div class="form-group">
                        <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="Menu Name" required autocomplete="off" ">
                    </div>
                    <div class=" modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">
                            Save Changes
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
                    <a href="#" class="btn">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
<?= $this->endSection(); ?>