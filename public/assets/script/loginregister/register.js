$(document).ready(function () {

    // alert('a');
    // Toast.fire({
    //     icon: 'success',
    //     title: 'tes',
    //     text:'a'
    // });
    $('#fRegis').on('keydown', function (e) {
        if (e.which === 13) {
            $('#btnDaftar').submit()
        }
    });
});
