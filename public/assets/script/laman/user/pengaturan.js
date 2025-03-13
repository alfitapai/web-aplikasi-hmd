$(document).ready(function () {

    $('#tblShift').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/shiftList",
        columns: [
            // {
            // data: 'DT_RowIndex',
            // name: 'DT_RowIndex',
            // orderable: false,
            // searchable: false
            // },
            {
                data: 'urutan',
                name: 'Urutan'
            }, {
                data: 'jam',
                name: 'Jam'
            }, {
                data: 'tombol',
                name: ''
            }],
    });

    // edit-shift
    // del-shift

    $('#tblShift').on('click', '.edit-shift', function () {
        // let dataId = $(this).data('id');
        // alert(dataId);
        let row = $(this).closest('tr');
        let button = $(this);
        let inputs = row.find('input');
        // let button = inputs.eq(2);
        let dataId = button.data('id');
        // alert(button.text)
        // console.log(button.text());
        let jamAwal = inputs.eq(1).val()
        let jamAkhir = inputs.eq(2).val()

        if (button.text() === 'Ubah') {
            inputs.prop('disabled', false);
            button.text('Simpan');
        } else if (button.text() === 'Simpan') {
            let rowData = {
                id: dataId,
                urutan: inputs.eq(0).val(),
                // jamAwal: inputs.eq(1).val(),
                // jamAkhir: inputs.eq(2).val(),
                jam: jamAwal + '-' + jamAkhir,
            }
            button.text('Ubah');
            console.log(rowData);
        }
        row.find('input').prop('disabled', false);
    });


    $('#tblShift').off('click', '.s-shift').on('click', '.s-shift', function () {
        Swal.fire({
            title: 'Ubah Shift?',
            icon: 'question',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Iya',
            denyButtonText: 'Tidak',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Masukan Kata Sandi',
                    input: 'password',
                    inputPlaceholder: 'Kata Sandi',
                    inputAttributes: {
                        maxLength: '10',
                        autocapitalize: 'off',
                        autocorrect: 'off'
                    }
                }).then((passwordResult) => {
                    if (passwordResult.isConfirmed) {
                        const correctPassword = '1234';
                        if (passwordResult.value === correctPassword) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Password Benar'
                            });
                            $('.edit-shift').prop('disabled', false);
                            $('.del-shift').prop('disabled', false);

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Kesalahan',
                                text: 'Kata Sandi Salah!'
                            });
                        }
                    } else if (passwordResult.isDismissed) {
                        Toast.fire({
                            title: 'Input DIbatalkan'
                        })
                    }
                })
            } else if (result.isDenied) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Mengubah Shift dibatalkan'
                });
            } else if (result.isDismissed) {
                Toast.fire({
                    title: 'dibatalkan'
                });
            }
        });
    });
});
