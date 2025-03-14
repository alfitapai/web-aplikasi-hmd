function unformatRupiah(angka, prefix) {
    if (!angka) {
        return '';
    }

    if (typeof angka !== 'string') {
        angka = angka.toString();
    }

    // Hilangkan semua koma
    return angka.replace(/,/g, '');
    // if (!angka) {
    //     return '';
    // }

    // if (typeof angka !== 'string') {
    //     angka = angka.toString();
    // }

    // var number_string = angka.replace(/[^,\d]/g, '').toString();

    // // Pisahkan bagian desimal
    // var split = number_string.split(',');

    // // Hilangkan pembatas ribuan
    // var rupiah = split[0].replace(/\./g, '');

    // // Gabungkan kembali dengan bagian desimal, jika ada
    // if (split[1] !== undefined && split[1] !== '00') {
    //     rupiah += ',' + split[1].substr(0, 2);
    // }

    // return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
}

// function removeCommaSeparator(angka) {
//     if (!angka) {
//         return '';
//     }

//     if (typeof angka !== 'string') {
//         angka = angka.toString();
//     }

//     // Hilangkan semua koma
//     return angka.replace(/,/g, '');
// }

function formatRupiah(angka, prefix) {
    if (!angka) {
        return '';
    }

    if (typeof angka !== 'string') {
        angka = angka.toString();
    }

    // Cek apakah angka negatif
    var isNegative = angka[0] === '-';
    angka = isNegative ? angka.slice(1) : angka;

    var number_string = angka.replace(/[^.\d]/g, '').toString(),
        split = number_string.split('.'),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // Tambahkan tanda koma setiap 3 angka
    if (ribuan) {
        separator = sisa ? ',' : '';
        rupiah += separator + ribuan.join(',');
    }

    // Gabungkan dengan bagian desimal, jika ada
    if (split[1] !== undefined) {
        rupiah += '.' + split[1];
    }

    // Tambahkan tanda minus jika angka negatif
    rupiah = isNegative ? '-' + rupiah : rupiah;

    return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
}







// function formatRupiah(angka, prefix) {
//     if (!angka) {
//         return '';
//     }

//     if (typeof angka !== 'string') {
//         angka = angka.toString();
//     }

//     // Cek apakah angka negatif
//     var isNegative = angka[0] === '-';
//     angka = isNegative ? angka.slice(1) : angka;

//     var number_string = angka.replace(/[^,\d]/g, '').toString(),
//         split = number_string.split(','),
//         sisa = split[0].length % 3,
//         rupiah = split[0].substr(0, sisa),
//         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

//     // Tambahkan tanda titik setiap 3 angka
//     if (ribuan) {
//         separator = sisa ? '.' : '';
//         rupiah += separator + ribuan.join('.');
//     }

//     // Gabungkan dengan bagian desimal, jika ada
//     if (split[1] !== undefined) {
//         rupiah += ',' + split[1];
//     }

//     // Tambahkan tanda minus jika angka negatif
//     rupiah = isNegative ? '-' + rupiah : rupiah;

//     return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
// }


// function unformatRupiah(angka, prefix) {
//     if (!angka) {
//         return '';
//     }

//     if (typeof angka !== 'string') {
//         angka = angka.toString();
//     }

//     var number_string = angka.replace(/[^,\d]/g, '').toString();

//     // Hilangkan pembatas ribuan dan desimal
//     var rupiah = number_string.replace(/\./g, '').replace(/,/g, '');

//     return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
//     // return parseInt(rupiah.replace(/[^,\d]/g, ''), 10);
// }



// // function hanyaAngka(event) {
// //     // Allow backspace, delete, tab, and arrow keys
// //     if (event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 9 || (event.keyCode >= 37 && event.keyCode <= 40)) {
// //         return;
// //     }

// //     // Allow only numeric characters
// //     if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
// //         event.preventDefault();
// //     }
// // }


// // function formatUang(event) {
// //     // Allow backspace, delete, tab, and arrow keys
// //     if (event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 9 || (event.keyCode >= 37 && event.keyCode <= 40)) {
// //         return;
// //     }

// //     // Allow only numeric characters and decimal point
// //     if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 46) {
// //         event.preventDefault();
// //         return;
// //     }

// //     // Format the input as IDR currency
// //     var input = $(this);
// //     var num = input.val().replace(/[^0-9.]/g, '');
// //     var formattedNum = num.toString().split('.').reverse().join('.');
// //     var formattedNumWithCommas = formattedNum.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
// //     var formattedNumReversed = formattedNumWithCommas.split('.').reverse().join('.');
// //     input.val(formattedNumReversed);
// // }



// // function unformatUang(event) {
// //     // Allow backspace, delete, tab, and arrow keys
// //     if (event.keyCode === 8 || event.keyCode === 46 || event.keyCode === 9 || (event.keyCode >= 37 && event.keyCode <= 40)) {
// //         return;
// //     }

// //     // Remove periods and format the input as a number
// //     var input = $(this);
// //     var num = input.val().replace(/\./g, '');
// //     input.val(num);
// // }


// // $(document).ready(function () {
// //     $('#your_input_id').keypress(deleteCurrencyFormat);
// // });
