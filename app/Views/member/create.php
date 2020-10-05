<?= $this->extend('layout/template_main'); ?>
<?= $this->section('content'); ?>

<div class="container w-75 justify-content-start">
    <div class="row">
        <div class="col mb-3">
            <a class="d-flex justify-content-start" href="/member/">
                <i class="fas fa-chevron-left fa-2x"></i>
            </a>
            <!-- Member Insert and Update Modal-->
            <h1>Member Baru</h1>
        </div>
    </div>

    <hr>

    <div>

        <!-- Start Form -->
        <!-- INSERT and UPDATE Form -->
        <form id="member-form" action="/member/insert" method="POST" class="user">

            <!-- ID place holder for javascript -->
            <input type="hidden" id="id" name="id">

            <table class="table table-borderless">
                <!-- Image -->
                <tr>
                    <td>Foto Profile</td>
                    <td>:</td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="image" id="image" placeholder="Image" required autocomplete="off">
                        </div>
                    </td>
                </tr>

                <!-- Name -->
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap" required autocomplete="off">
                        </div>
                    </td>
                </tr>
                <!-- Address -->
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type=" text" class="form-control" name="address" id="address" placeholder="Alamat" required autocomplete="off">
                        </div>
                    </td>
                </tr>
                <!-- Birth Place -->
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type=" text" class="form-control" name="birth_place" id="birth_place" placeholder="Tempat Lahir" required autocomplete="off">
                        </div>
                    </td>
                </tr>
                <!-- Birth Date -->
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Tanggal Lahir" required autocomplete="off">
                        </div>
                    </td>
                </tr>
                <!-- Religion -->
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <select class="custom-select" name="religion" id="religion" onreset="(this.value = '')">
                                <option id="option-default" hidden selected>Agama</option>
                                <option id="Islam" value="Islam">Islam</option>
                                <option id="Hindu" value="Hindu">Hindu</option>
                                <option id="Protestan" value="Protestan">Protestan</option>
                                <option id="Katolik" value="Katolik">Katolik</option>
                                <option id="Buddha" value="Buddha">Buddha</option>
                                <option id="Khonghucu" value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <!-- Phone -->
                <tr>
                    <td>Nomor Telepon</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type=" text" class="form-control" name="phone" id="phone" placeholder="Nomor Telepon" required autocomplete="off">
                        </div>
                    </td>
                </tr>
                <!-- Gender -->
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group d-flex justify-content-start">
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="radio" name="gender" id="gender1" value="m" checked>
                                <label class="form-check-label" for="gender1">
                                    Pria
                                </label>
                            </div>
                            <div class="form-check d-inline-block mx-4">
                                <input class="form-check-input" type="radio" name="gender" id="gender2" value="f">
                                <label class="form-check-label" for="gender2">
                                    Wanita
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>


            <div class=" modal-footer">
                <!-- Submit -->
                <button id="memberButton" type="submit" class="btn btn-primary btn-block">
                    Submit
                </button>
                <!-- Reset -->
                <button id="resetButton" type="reset" class="btn btn-success btn-block">
                    Reset
                </button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>


<?= $this->endSection(); ?>