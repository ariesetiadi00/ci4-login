$(function () {
    // Member Reset
    $('#member_reset').click(function () {
        console.log("member reset"); 
        $('#settingsModalLabel').html('Reset Semua Data Member')
        $('#form-reset').trigger('reset');
        $('#form-reset').attr('action', '/member/reset');
        $('#span-kunci').html('reset-member');
    });
    
    // Payment Reset
    $('#payment_reset').click(function () {
        console.log("payment reset"); 
        $('#settingsModalLabel').html('Reset Semua Data Pembayaran')
        $('#form-reset').trigger('reset');
        $('#form-reset').attr('action', '/payment/reset');
        $('#span-kunci').html('reset-payment');
    });
});