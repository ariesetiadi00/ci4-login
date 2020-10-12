<?= $this->extend('layout/template_auth'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-sm-11 col-md-8 col-lg-6 col-xl-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                                </div>
                                <!-- Alert Login -->
                                <br>
                                <?php if (!empty(session()->getFlashData('message'))) : ?>
                                    <div class="alert fade show <?= (null != (session()->getFlashData('c'))) ? 'alert-danger' : 'alert-success' ?>" role="alert">
                                        <strong><?= session()->getFlashData('strong') ?></strong> <?= session()->getFlashData('message') ?>
                                    </div>
                                <?php endif; ?>
                                <hr>
                                <br>
                                <form action="/auth/login" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="Email" required autocomplete="off" value="<?= old('email') ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" name="password" id="password" placeholder="Password" required autocomplete="off">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password') ?>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </form>
                                <br>
                                <hr>
                                <br>
                                <!-- <div class="text-center">
                                    <a class="small btn" href="/auth/register">Create an Account</a>
                                </div> -->
                                <div class="text-center">
                                    <a class="small btn" href="forgot-password.html">Forgot Password ?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>