<?= $this->extend('layout/template_main'); ?>
<?= $this->section('content'); ?>

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
                <!-- Member detail box -->
                <table class="table">
                    <!-- Address Line -->
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td class="member-address"></td>
                    </tr>
                    <!-- Place of Birth -->
                    <tr>
                        <td>Place of Birth</td>
                        <td>:</td>
                        <td class="member-place"></td>
                    </tr>
                    <!-- Date of Birth -->
                    <tr>
                        <td>Date of Birth</td>
                        <td>:</td>
                        <td class="member-date"></td>
                    </tr>
                    <!-- Religion -->
                    <tr>
                        <td>Religion</td>
                        <td>:</td>
                        <td class="member-religion"></td>
                    </tr>
                    <!-- Gender -->
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td class="member-gender"></td>
                    </tr>
                    <!-- Phone Number -->
                    <tr>
                        <td>Phone Number</td>
                        <td>:</td>
                        <td class="member-phone"></td>
                    </tr>
                    <!-- Joined on -->
                    <tr>
                        <td>Joined on</td>
                        <td>:</td>
                        <td class="member-join"></td>
                    </tr>
                </table>
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


<?= $this->endSection(); ?>