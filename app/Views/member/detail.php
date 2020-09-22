<?= $this->extend('layout/template_main'); ?>
<?= $this->section('content'); ?>

<div class="modal-body">
    <div class="container">
        <div class="row text-center">
            <div class="col mb-3">
                <h2 class="member-name"><?= $member['name'] ?></h2>
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
                        <td class="member-address"><?= $member['address'] ?></td>
                    </tr>
                    <!-- Place of Birth -->
                    <tr>
                        <td>Place of Birth</td>
                        <td>:</td>
                        <td class="member-place"><?= $member['birth_place'] ?></td>
                    </tr>
                    <!-- Date of Birth -->
                    <tr>
                        <td>Date of Birth</td>
                        <td>:</td>
                        <td class="member-date"><?= date("j F Y", strtotime($member['birth_date'])) ?></td>
                    </tr>
                    <!-- Religion -->
                    <tr>
                        <td>Religion</td>
                        <td>:</td>
                        <td class="member-religion"><?= $member['religion'] ?></td>
                    </tr>
                    <!-- Gender -->
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td class="member-gender"><?= ($member['gender'] == "m") ? 'Male' : 'Female' ?></td>
                    </tr>
                    <!-- Phone Number -->
                    <tr>
                        <td>Phone Number</td>
                        <td>:</td>
                        <td class="member-phone"><?= $member['phone'] ?></td>
                    </tr>
                    <!-- Joined on -->
                    <tr>
                        <td>Joined on</td>
                        <td>:</td>
                        <td class="member-join"><?= date("j F Y - g:i a", strtotime($member['created_at'])) ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <form action="/payment/" method="post">
                    <input class="id" type="hidden" name="id">

                    <?php if ($status > 0) : ?>
                        <button class="confirm-button btn btn-block btn-success" type="submit" id="pay" disabled name="pay">
                            Already Paid
                        </button>
                    <?php else : ?>
                        <button class="confirm-button btn btn-block btn-success" type="submit" id="pay" name="pay" onclick='return confirm("Confirm payment from this member ?")'>
                            Confirm Payment
                        </button>
                    <?php endif; ?>

                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h6 class="text-center">Payment History</h6>
                <table class="table payment-history">
                    <tr>
                        <th>#</th>
                        <th>Desc</th>
                        <th>Paid at</th>
                        <th>Amount</th>
                    </tr>
                    <!-- Looping Payment History -->
                    <?php $i = 1 ?>
                    <?php foreach ($history as $h) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>Payment in <?= date('F', mktime(0, 0, 0, $h['month'])) ?></td>
                            <td><?= date("j F Y - g:i a", strtotime($h['created_at'])) ?></td>
                            <td>Rp. <?= number_format($h['amount'], 2)  ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>