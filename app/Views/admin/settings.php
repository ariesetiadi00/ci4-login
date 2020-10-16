<?= $this->extend('layout/template_main'); ?>

<?= $this->section('content'); ?>

<?php if (session()->getFlashData('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('message') ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div>
    <h5>Pengaturan Member</h5>
    <a id="member_reset" href="/member/reset" class="btn btn-primary" data-toggle="modal" data-target="#settingsModal">Reset Data Member</a>
</div>
<hr>
<div>
    <h5>Pengaturan Pembayaran</h5>
    <a id="payment_reset" href="/payment/reset" class="btn btn-primary" data-toggle="modal" data-target="#settingsModal">Reset Data Pembayaran</a>
</div>

<!-- ========================================= -->

<!-- Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">Reset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <span>Kata Kunci : </span>
                    <strong id="span-kunci"></strong>
                </div>
                <form id="form-reset" action="/" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kunci" name="kunci" placeholder="Ketik kata kunci diatas" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Reset</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>