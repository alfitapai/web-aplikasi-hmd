$(document).ready(function () {

    function loadDatas() {
        $.ajax({
            url: '/stokList',
            method: 'GET',
            success: function (response) {
                let isiData = response.barang || [];
                // console.log(response.barang)
                if (!Array.isArray(isiData)) {
                    console.error('Data yang diterima bukan array:', isiData);
                    return;
                }
                // var penjualanTable = $('#penjualan-table tbody');
                // var inventarisTable = $('#inventaris-table tbody');
                // penjualanTable.empty();
                // inventarisTable.empty();
                // let penjualanTbl = $('#stokPenjualan tbody');
                let penjualanTbl = $('#listStokPenjualan');
                penjualanTbl.empty();
                // console.log(data);

                isiData.forEach(function (item, index) {
                    // let nomorBaris = index + 1;
                    let nomorBaris = item.id || '-';
                    let namaBarang = item.nama_barang || '';
                    let qty = item.qty || 0;
                    let satuan = item.satuan || '';
                    let tipeBarang = item.tipe_barang || '--Tipe--';


                    let row = `<tr data-row="${nomorBaris}">` +
                        ` <td class="baris">${nomorBaris}</td>` +
                        ` <td><input type="text" name="namaitem[]" class="form-control nama-item" disabled value="${namaBarang}"></td>` +
                        ` <td>` +
                        `     <div class="d-flex justify-content-between">` +
                        `         <input type="text" name="qty[]" class="form-control qty" inputmode="numeric" value="${qty}" disabled>` +
                        `         <input type="text" name="satuan[]" class="form-control satuan"  value="${satuan}" disabled>` +
                        `     </div>` +
                        ` </td>` +
                        `<td>` +
                        ` <select name="tipe[]" class="form-select" disabled>` +
                        `      <option value="Penjualan">Penjualan</option>` +
                        `      <option value="Inventaris">Inventaris</option>` +
                        `      <option selected value="${tipeBarang}">${tipeBarang}</option>` +
                        `  </select>` +
                        `  </td>` +
                        ` <td>` +
                        `     <div class="d-flex justify-content-between">` +
                        `         <button class="btn btn-primary edit-baris" data-row="${nomorBaris}" ><i class="fa-solid fa-pen-to-square"></i></button>` +
                        `         <button class="btn btn-danger hapus-baris" data-row="${nomorBaris}" ><i class="fa-solid fa-trash"></i></button>` +
                        `     </div>` +
                        `  </td>` +
                        `  </tr>`;
                    penjualanTbl.append(row);
                });
                uNomorBaris();
            }
        });
    }

    loadDatas();



    function uNomorBaris() {
        $("#stokPenjualan tbody tr").each(function (index) {
            $(this).find(".baris").text(index + 1);
        });
    };
    $("#stokPenjualan").off("click", ".save-baris").on("click", ".save-baris", function () {
        let button = $(this);
        let dataId = button.data('row');
        let baris = $(this).closest('tr');
        let namaItem = baris.find('input[name="namaitem[]"]').val();
        let qty = baris.find('input[name="qty[]"]').val();
        let satuan = baris.find('input[name="satuan[]"]').val();
        let tipe = baris.find('select[name="tipe[]"]').val();

        baris.find('input').prop('disabled', true);
        baris.find('select').prop('disabled', true);
        $(this).html('<i class="fa-solid fa-pen-to-square"></i>');
        $(this).removeClass('save-baris').addClass('edit-baris');

        // let dataRow = {
        //     namaItem: namaItem,
        //     qty: qty,
        //     satuan: satuan,
        //     tipe_barang: tipe,
        // };
        // console.log(dataRow);
        // // stokList
        $.ajax({
            url: '/stok-createorupdate',
            method: 'POST',
            data: {
                id: dataId !== 'new' ? dataId : null,
                nama_barang: namaItem,
                qty: qty,
                satuan: satuan,
                tipe_barang: tipe
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: 'data ditambah / di ubah'
                });
            }
        });
    });

    $("#stokPenjualan").off("click", ".edit-baris").on("click", ".edit-baris", function () {
        let baris = $(this).closest('tr');
        baris.find('input').prop('disabled', false);
        baris.find('select').prop('disabled', false);
        $(this).html('<i class="fa-solid fa-save"></i>');
        $(this).removeClass('edit-baris').addClass('save-baris');
    });

    $("#stokPenjualan").off("click", ".hapus-baris").on("click", ".hapus-baris", function () {
        ToastModal.fire({
            title: 'Hapus Data ini ?',
            icon: 'question',
            text: 'data yang terlanjur dihapus tidak bisa dikembalikan',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Iya',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                let dataId = $(this).data('row');
                $.ajax({
                    url: `/stokList/${dataId}`,
                    method: 'DELETE',
                    success: function (response) {
                        Toast.fire({
                            icon: 'success',
                            title: response.title
                        });
                        loadDatas();
                    }
                });
                // $(this).closest('tr').remove();
                // uNomorBaris();
                // loadDatas();
            }
        });
    });

    $("#stokPenjualan").off("click", ".tambah-stok").on("click", ".tambah-stok", function () {
        let nomorBaris = $("#stokPenjualan tbody tr").length + 1;
        let baris =
            `<tr data-row="new">` +
            ` <td class="baris">${nomorBaris}</td>` +
            ` <td><input type="text" name="namaitem[]" class="form-control nama-item" ></td>` +
            ` <td>` +
            `     <div class="d-flex justify-content-between">` +
            `         <input type="text" name="qty[]" class="form-control qty" inputmode="numeric" >` +
            `         <input type="text" name="satuan[]" class="form-control satuan" >` +
            `     </div>` +
            ` </td>` +
            `<td>` +
            ` <select name="tipe[]" class="form-select" >` +
            `      <option value="Penjualan">Penjualan</option>` +
            `      <option value="Inventaris">Inventaris</option>` +
            `      <option selected>--Tipe--</option>` +
            `  </select>` +
            `  </td>` +
            ` <td>` +
            `     <div class="d-flex justify-content-between">` +
            `         <button class="btn btn-primary save-baris" data-row="new" ><i class="fa-solid fa-save"></i></button>` +
            `         <button class="btn btn-danger hapus-baris" data-row="new" ><i class="fa-solid fa-trash"></i></button>` +
            `     </div>` +
            `  </td>` +
            `  </tr>`;
        $('#listStokPenjualan').append(baris);
        uNomorBaris();
    });



});
