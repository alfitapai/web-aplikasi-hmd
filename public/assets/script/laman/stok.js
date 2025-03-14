$(document).ready(function () {
    function uNomorBaris() {
        $("#stokPenjualan tbody tr").each(function (index) {
            $(this).find(".baris").text(index + 1);
        });
    };
    $("#stokPenjualan").off("click", ".save-baris").on("click", ".save-baris", function () {
        let baris = $(this).closest('tr');
        let namaItem = baris.find('input[name="namaitem[]"]').val();
        let qty = baris.find('input[name="qty[]"]').val();
        let satuan = baris.find('input[name="satuan[]"]').val();
        let tipe = baris.find('select[name="tipe[]"]').val();

        baris.find('input').prop('disabled',true);
        baris.find('select').prop('disabled',true);
        $(this).html('<i class="fa-solid fa-pen-to-square"></i>');
        $(this).removeClass('save-baris').addClass('edit-baris');

        let dataRow = {
            namaItem: namaItem,
            qty: qty,
            satuan: satuan,
            tipe_barang: tipe,
        };
        console.log(dataRow);
        // stokList
        $.ajax({

        });
    });

    $("#stokPenjualan").off("click", ".edit-baris").on("click", ".edit-baris", function () {
        let baris = $(this).closest('tr');
        baris.find('input').prop('disabled',false);
        baris.find('select').prop('disabled',false);
        $(this).html('<i class="fa-solid fa-save"></i>');
        $(this).removeClass('edit-baris').addClass('save-baris');
    });

    $("#stokPenjualan").off("click", ".hapus-baris").on("click", ".hapus-baris", function () {
        $(this).closest('tr').remove();
        uNomorBaris();
    });

    $("#stokPenjualan").off("click", ".tambah-stok").on("click", ".tambah-stok", function () {
            let nomorBaris = $("#stokPenjualan tbody tr").length + 1;
            let baris =
                `<tr data-row="${nomorBaris}">` +
                ` <td class="baris">${nomorBaris}</td>` +
                ` <td><input type="text" name="namaitem[]" class="form-control nama-item" disabled></td>` +
                ` <td>` +
                `     <div class="d-flex justify-content-between">` +
                `         <input type="text" name="qty[]" class="form-control qty" inputmode="numeric" disabled>` +
                `         <input type="text" name="satuan[]" class="form-control satuan" disabled>` +
                `     </div>` +
                ` </td>` +
                `<td>` +
                ` <select name="tipe[]" class="form-select" disabled>` +
                `      <option value="Penjualan">Penjualan</option>` +
                `      <option value="Inventaris">Inventaris</option>` +
                `      <option selected>--Tipe--</option>` +
                `  </select>` +
                `  </td>` +
                ` <td>` +
                `     <div class="d-flex justify-content-between">` +
                `         <button class="btn btn-primary edit-baris" data-row="${nomorBaris}" ><i class="fa-solid fa-pen-to-square"></i></button>` +
                `         <button class="btn btn-danger hapus-baris" data-row="${nomorBaris}" ><i class="fa-solid fa-trash"></i></button>` +
                `     </div>` +
                `  </td>` +
                `  </tr>`;
                $('#listStokPenjualan').append(baris);
                uNomorBaris();
        });
});
