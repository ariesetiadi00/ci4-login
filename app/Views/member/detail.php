<?= $this->extend('layout/template_main'); ?>
<?= $this->section('content'); ?>

<div class="modal-body">

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

    <div class="container">
        <div class="row text-center">
            <div class="col mb-3">
                <a class="d-flex justify-content-start" href="/member/">
                    <i class="fas fa-chevron-left fa-2x"></i>
                </a>
                <h2 class="d-inline-block justify-content-center"><?= $member['name'] ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 text-center p-2">
                <img class="w-75 rounded-circle c-shadow" src="/img/profile/<?= $member['image'] ?>" alt="Profile">
            </div>
            <div class="col-lg-8 text-center p-2 align-self-center">
                <!-- Member detail box -->
                <table class="table">
                    <!-- Address Line -->
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $member['address'] ?></td>
                    </tr>
                    <!-- Place of Birth -->
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td><?= $member['birth_place'] ?></td>
                    </tr>
                    <!-- Date of Birth -->
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?= date("j F Y", strtotime($member['birth_date'])) ?></td>
                    </tr>
                    <!-- Religion -->
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><?= $member['religion'] ?></td>
                    </tr>
                    <!-- Gender -->
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= ($member['gender'] == "m") ? 'Male' : 'Female' ?></td>
                    </tr>
                    <!-- Phone Number -->
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>:</td>
                        <td><?= $member['phone'] ?></td>
                    </tr>
                    <!-- Joined on -->
                    <tr>
                        <td>Bergabung pada </td>
                        <td>:</td>
                        <td><?= date("j F Y - g:i a", strtotime($member['created_at'])) ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <!-- Require Data
                    1. Member Debt
                    2. Current Price
                 -->

                <?php
                // Call Member Class
                use App\Controllers\Member;

                // Member Debt
                $debt = $db->table('member_payment_debt')->where('member_id', $member['id'])->orderBy('id', 'DESC')->limit(2)->get()->getResultArray();

                // Current Price
                $price = $db->table('member_payment_price')->get()->getResultArray()[0]['price'];

                ?>
                <div class="row my-5">
                    <div class="col">
                        <h6 class="text-center">Daftar Tagihan</h6>

                        <!-- Table Tagihan -->
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Bulan</th>
                                <th>Jumlah</th>
                                <th></th>
                            </tr>
                            <?php foreach ($debt as $i =>  $d) : ?>
                                <?php $status = Member::get_status($d['month'], $member['id']) ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= date('F', mktime(0, 0, 0, $d['month'])) ?></td>
                                    <td>Rp. <?= number_format($price, 2) ?></td>
                                    <td>
                                        <form action="/payment/" method="post">
                                            <!-- Send Hidden ID -->
                                            <input class="id" value="<?= $member['id'] ?>" type="hidden" name="id">

                                            <!-- Send Hidden Month -->
                                            <input type="hidden" id="month" name="month" value="<?= $d['month'] ?>">

                                            <?php if ($status) : ?>
                                                <button class="confirm-button btn btn-block btn-primary" type="submit" id="pay" disabled name="pay">
                                                    Sudah Terbayar
                                                </button>
                                            <?php else : ?>
                                                <button class="confirm-button btn btn-block btn-primary" type="submit" id="pay" name="pay" onclick='return confirm("Confirm payment from this member ?")'>
                                                    Bayar Tagihan
                                                </button>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="text-center">Riwayat Pembayaran</h6>
                <table class="table payment-history">
                    <tr>
                        <th>#</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                    </tr>
                    <!-- Looping Payment History -->
                    <?php $i = 1 ?>
                    <?php foreach ($history as $h) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>Pembayaran pada <?= date('F', mktime(0, 0, 0, $h['month'])) ?></td>
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