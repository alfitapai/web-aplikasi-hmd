$(document).ready(function () {
    $("#tblShift").DataTable({
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
                data: "urutan",
                name: "Urutan",
            },
            {
                data: "jam",
                name: "Jam",
            },
            {
                data: "tombol",
                name: "",
            },
        ],
    });

    // edit-shift
    // del-shift
    $("#tblShift").on("click", ".del-shift", function () {
        ToastModal.fire({
            title: 'Hapus Shift?',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result)=>{
            if(result.isConfirmed){
                let dataId = $(this).data('id');
                // console.log(dataId);
                $.ajax({
                    type: 'DELETE',
                    url: `/shiftList/${dataId}`,
                    success: function (response){
                        Toast.fire({
                            icon: 'success',
                            title: response.message,
                            // text: response.message
                        });
                        $('#tblShift').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan',
                            text: 'Terjadi kesalahan saat menghapus shift!'
                        });
                    }
                });
            }
        });
    });

    $("#tblShift").on("click", ".edit-shift", function () {
        // let dataId = $(this).data('id');
        // alert(dataId);
        let row = $(this).closest("tr");
        let button = $(this);
        let inputs = row.find("input");
        // let button = inputs.eq(2);
        let dataId = button.data("id");
        // alert(button.text)
        // console.log(button.text());
        let jamAwal = inputs.eq(1).val();
        let jamAkhir = inputs.eq(2).val();

        if (button.text() === "Ubah") {
            inputs.prop("disabled", false);
            button.text("Simpan");
        } else if (button.text() === "Simpan") {
            let rowData = {
                // id: dataId,
                urutan: inputs.eq(0).val(),
                // jamAwal: inputs.eq(1).val(),
                // jamAkhir: inputs.eq(2).val(),
                jam: jamAwal + "-" + jamAkhir,
            };
            $.ajax({
                type: 'PUT',
                url: `/shiftList/${dataId}`,
                data: rowData,
                success: function (response){
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message
                    });
                    $("#tblShift").DataTable().ajax.reload();
                    button.text("Ubah");
                    console.log(rowData);
                    row.find("input").prop("disabled", true);
                    $(".edit-shift").prop("disabled", true);
                    $(".del-shift").prop("disabled", true);
                }
            });
        }
    });

    $("#tblShift")
        .off("click", ".s-shift")
        .on("click", ".s-shift", function () {
            Swal.fire({
                title: "Masukan Kata Sandi",
                input: "password",
                inputPlaceholder: "Kata Sandi",
                inputAttributes: {
                    maxLength: "10",
                    autocapitalize: "off",
                    autocorrect: "off",
                },
            }).then((passwordResult) => {
                if (passwordResult.isConfirmed) {
                    const correctPassword = "1234";
                    if (passwordResult.value === correctPassword) {
                        Swal.fire({
                            icon: "question",
                            showConfirmButton: false,
                            html:
                                '<button id="buttonTambahShift" class="swal2-confirm swal2-styled" style="background-color:rgb(33, 156, 64); " >Tambah Shift</button>' +
                                '<button id="buttonEditShift" class="swal2-confirm swal2-styled" style="background-color: #3085d6; " >Edit Shift</button>',
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Kesalahan",
                            text: "Kata Sandi Salah!",
                        });
                    }
                }
            });

            // Swal.fire({
            //     icon: 'question',
            //     showConfirmButton: false,
            //    html:
            //    '<button id="buttonTambahShift" class="swal2-confirm swal2-styled" style="background-color:rgb(33, 156, 64); " >Tambah Shift</button>'+
            //    '<button id="buttonEditShift" class="swal2-confirm swal2-styled" style="background-color: #3085d6; " >Edit Shift</button>'
            // });

            // Swal.fire({
            //     title: 'Ubah Shift?',
            //     icon: 'question',
            //     showDenyButton: true,
            //     showCancelButton: true,
            //     confirmButtonText: 'Iya',
            //     denyButtonText: 'Tidak',
            //     cancelButtonText: 'Batal',
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         Swal.fire({
            //             title: 'Masukan Kata Sandi',
            //             input: 'password',
            //             inputPlaceholder: 'Kata Sandi',
            //             inputAttributes: {
            //                 maxLength: '10',
            //                 autocapitalize: 'off',
            //                 autocorrect: 'off'
            //             }
            //         }).then((passwordResult) => {
            //             if (passwordResult.isConfirmed) {
            //                 const correctPassword = '1234';
            //                 if (passwordResult.value === correctPassword) {
            //                     Toast.fire({
            //                         icon: 'success',
            //                         title: 'Password Benar'
            //                     });
            //                     $('.edit-shift').prop('disabled', false);
            //                     $('.del-shift').prop('disabled', false);

            //                 } else {
            //                     Swal.fire({
            //                         icon: 'error',
            //                         title: 'Kesalahan',
            //                         text: 'Kata Sandi Salah!'
            //                     });
            //                 }
            //             } else if (passwordResult.isDismissed) {
            //                 Toast.fire({
            //                     title: 'Input DIbatalkan'
            //                 })
            //             }
            //         })
            //     } else if (result.isDenied) {
            //         Toast.fire({
            //             icon: 'warning',
            //             title: 'Mengubah Shift dibatalkan'
            //         });
            //     } else if (result.isDismissed) {
            //         Toast.fire({
            //             title: 'dibatalkan'
            //         });
            //     }
            // });
        });

    $(document).on("click", "#buttonEditShift", function () {
        Swal.close();
        $(".edit-shift").prop("disabled", false);
        $(".del-shift").prop("disabled", false);
    });
    $(document).on("click", "#buttonTambahShift", function () {
        Swal.close();
        Swal.fire({
            title: "Tambah Shift",
            html:
                '<div class="row">' +
                ' <div class="col-12 mb-3">' +
                ' <div class="form-floating">' +
                '    <input type="text" name="namashift" id="namaShift" class="form-control" placeholder="Nama Shift">' +
                '    <label for="namaShift">Nama Shift</label>' +
                "  </div>" +
                "   </div>" +
                '   <div class="col-6 mb-3">' +
                '     <div class="form-floating">' +
                '      <input type="time" name="masuk" id="masukShift" class="form-control">' +
                '      <label for="masukShift">Masuk</label>' +
                "  </div>" +
                "  </div>" +
                '   <div class="col-6 mb-3">' +
                '      <div class="form-floating">' +
                '         <input type="time" name="keluar" id="keluarShift" class="form-control">' +
                '        <label for="keluarShift">Keluar</label>' +
                "    </div>" +
                "  </div>" +
                " </div>",
            showCancelButton: true,
            confirmButtonText: "Simpan",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                const namaShift = document.getElementById("namaShift").value;
                const masukShift = document.getElementById("masukShift").value;
                const keluarShift =
                    document.getElementById("keluarShift").value;
                const jamShift = masukShift + "-" + keluarShift;
                // console.log('Nama Shift: ' + namaShift+'\n jam: '+masukShift+'-'+keluarShift);
                // shiftList
                $.ajax({
                    type: "POST",
                    url: "/shiftList",
                    data: {
                        urutan: namaShift,
                        jam: jamShift,
                    },
                    success: function (response) {
                        Toast.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: response.message,
                        });
                        $("#tblShift").DataTable().ajax.reload();
                    },
                    error: function (xhr) {
                        Toast.fire({
                            icon: "error",
                            title: "Gagal",
                            text: xhr.responseText,
                        });
                    },
                });
            }
        });
    });
});
