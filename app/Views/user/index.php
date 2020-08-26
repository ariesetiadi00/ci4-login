<?= $this->extend('layout/template_user'); ?>

<?= $this->section('content'); ?>
<div>
    <div class="row">
        <div class="col-md-3 d-flex justify-content-center">
            <img src="img/profile/<?= $user['image'] ?>" alt="Profile" class="rounded-circle d-profile m-3">
        </div>
        <div class="card col-md-5">
            <div class="card-body">
                <h5 class="card-title text-center"><?= $user['name'] ?></h5>
                <table border="1" class="t-profile">
                    <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td>
                            <p class="card-text"><?= $user['email'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>Join on</td>
                        <td> : </td>
                        <td>
                            <p class="card-text"><?= date('j F Y', strtotime($user['date_created'])) ?></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>