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
                                    <h1 class="h4 text-gray-900 mb-4">Registration Page</h1>
                                </div>
                                <br>
                                <hr>
                                <br>
                                <form action="/auth/save" method="POST" class="user">
                                    <!-- Name -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required autocomplete="off" value="<?= old('name') ?>">
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" name="email" id="email" placeholder="Email" required autocomplete="off" value="<?= old('email') ?>">
                                        <!-- Error -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ?>
                                        </div>
                                    </div>
                                    <!-- Pass -->
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <input type="password" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : '' ?>" name="password1" id="password1" placeholder="Password" required autocomplete="off">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password2') ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <input type="password" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : '' ?>" name="password2" id="password2" placeholder="Repeat Password" required autocomplete="off">
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Submit
                                    </button>
                                </form>
                                <br>
                                <hr>
                                <br>
                                <div class="text-center">
                                    <span>Already have an account ?</span>
                                    <a class="btn" href="/auth">Login</a>
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