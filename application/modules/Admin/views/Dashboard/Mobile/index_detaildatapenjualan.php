<style> 
    .warna{
        color:red;
    }
</style>
<div class="page-content-wrapper">
    <div class="container">
        <div class="cart-wrapper-area py-3">
            <div class="cart-table card mb-3">
                <div class="card shipping-method-choose-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Detail Transaksi</h6>
                    </div>
                </div>
                <div class="table-responsive card-body">
                <table class="table mb-0">
                            <tbody>
                                <div class="row">
                                    <tr>
                                        <th>#</th>
                                        <th>Produk</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                    </tr>
                                <?php foreach($DataPenjualan->data  as $row ): ?>
                                <?php if($row->_id->id_penjualan == $id_transaksi): ?>
                                    <?php 
                                    $total_transaksi= 0;
                                    $total_dp = 0;
                                     $total_dp = $row->_id->total_dp;
                                     $total_transaksi = $row->_id->total_bayar;
                                    $detailBarang = $row->detail_barang;
                                    $total_barang = count($detailBarang);
                                    $no =1;
                                    for($d = 0; $d<$total_barang; $d++): ?>
                                    <?php
                                        $databarang = $detailBarang[$d]->gambar;
                                        for ($i = 0; $i < 1; $i++) :
                                            $gambar = $databarang[$i]->lokasi_gambar;
                                            if ($gambar == "-") {
                                                $gambar = "notfound.png";
                                            }
                                        ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><img onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $databarang[$i]->lokasi_gambar ?>"></td>
                                        <td><?= $detailBarang[$d]->nama_barang ?> </td>
                                        <td>1</td>
                                        <td><?= number_format($detailBarang[$d]->harga) ?></td>
                                    </tr>
                                <?php endfor; ?>
                                <?php $no++; endfor; ?>
                                <?php else: ?>
                                <?php endif; ?>
                                   
                                <?php endforeach; ?>
                                    <tr>
                                        <td colspan="3" nowrap> Total Transaksi</td>
                                        <td> </td>
                                        <td colspan="3"><?= number_format($total_transaksi) ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" nowrap> Total Dp</td>
                                        <td> </td>
                                        <td colspan="3"><?= number_format($total_dp) ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" nowrap><p class="warna"> Sisa Yang Harus dibayar</p></td>
                                        <td> </td>
                                        <td colspan="3"><p class="warna"><?= number_format($total_transaksi / 2) ?> </p></td>
                                    </tr>
                                   
                                </div>
                            </tbody>
                    </table>
                   
                </div>
                <div class="card user-data-card">
                   <div class="container text-center"> Form Pengambilan</div>
                   <form method="POST" id="formValidasiPenjualan" class="loadingkonfimasi" enctype="multipart/form-data">
                        <div class="card-body">
                            <label class="title mb-2"> Kode CUstomer </label>
                            <div class="input-group mb-3">
                                <input type="hidden" value="<?= $id_transaksi ?>" name="id_transaksi" class="form-control id_transaksi" onkeypress="return event.keyCode!=13" placeholder="Masukan Kode Customer" >
                                <input type="text"  onkeypress="return NumberNoEnter(event)" autocomplete="off" name="kode_customer" required class="form-control id_customer" onkeypress="return event.keyCode!=13" placeholder="Masukan Kode Customer" >
                                <div class="input-group-append">
                                    <a class="input-group-text" style="cursor: pointer;" id="btn_click">Cek</a>
                                </div>
                            </div>
                           <div id="formdataserah"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<script>
    function NumberNoEnter(evt) {
	if (evt.keyCode != 13) {
		var charCode = evt.which ? evt.which : event.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
		return true;
	} else {
		return false;
	}
}
    $('#btn_click').on('click',function(){
       var kode         = $('.id_customer').val();
       var id_transaksi = $('.id_transaksi').val();
       run_waitMe($('.loadingkonfimasi'), 1, 'bounce');
       $.ajax({
            url: base_url + "cekkodecustomer",
            dataType: 'json',
            type: 'POST',
            data: {
                kode_customer: kode,
                id_transaksi: id_transaksi
            },
            success: function(respons) {
                if(respons.status=="berhasil"){
                    // console.log();
                    if(respons.data.length ==0){
                        Swal.fire({
                        title: 'Oops !!!',
                        text: 'Data Yang Anda Cari Tidak Ada',
                        type: "info",
                        showCancelButton: false,
                        confirmButtonText: "Ok",
                        reverseButtons: true,
                    })
                    $('#formdataserah').html('');
                    $('.loadingkonfimasi').removeClass('waitMe_container');
                    $('.waitMe').remove();
                    }else{
                    $('.loadingkonfimasi').removeClass('waitMe_container');
                    $('.waitMe').remove();
                    $('#formdataserah').html('');
                    $.each(respons.data, function(index, element) {
                        $('#formdataserah').append(`
                                <div class="form-group">
                                    <div class="title mb-2"><span>Nama Customer</span>
                                    <input class="form-control nama_customer" required onkeypress="return event.keyCode!=13" placeholder="Masukan Nama Customer" name="nama_customer" required type="text" value="`+element._id.nama_customer+`">
                                </div>
                                <div class="form-group">
                                    <div class="title mb-2"><span>No Hp</span>
                                    <input class="form-control no_hp" required onkeypress="return event.keyCode!=13" placeholder="Masukan No Hp" name="no_hp" required type="text" value="`+element._id.no_hp+`">
                                </div>
                                <div class="form-group">
                                    <div class="title mb-2"><span>Email</span>
                                    <input class="form-control email" required onkeypress="return event.keyCode!=13" placeholder="Masukan Email" name="email" required type="email" value="`+element._id.email+`">
                                </div>
                                <div class="form-group">
                                    <div class="title mb-2"><span>Alamat</span>
                                    <textarea class="form-control alamat" required onkeypress="return event.keyCode!=13" placeholder="Masukan Email" name="alamat" required value="">`+element._id.alamat+`</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="title mb-2"><span>Foto Bukti Pengambialan</span>
                                    <input class="form-control" required  placeholder="Masukan No Hp" name="bukti_ambil" required type="file" accept="image/*;capture=camera">
                                </div>
                            <button class="btn btn-success w-100" type="submit">Validasi Penjualan</button>
                        `);
                    })
                }
                }else{
                    Swal.fire({
                        title: 'Oops !!!',
                        text: respons.pesan,
                        type: "info",
                        showCancelButton: false,
                        confirmButtonText: "Ok",
                        reverseButtons: true,
                    })
                    $('.loadingkonfimasi').removeClass('waitMe_container');
                    $('.waitMe').remove();
                    $('#formdataserah').html('');
                }
            }
        })
     
    })
    $('#formValidasiPenjualan').submit(function(e){
        e.preventDefault(); 
        run_waitMe($('.loadingkonfimasi'), 1, 'bounce');
        // console.log(new FormData(this));
        $.ajax({
                url:base_url + 'serah-ambil',
                type:"post",
                data:new FormData(this),
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                success: function(data){
                    console.log(data);
                if(data.status=="berhasil"){
                        Swal.fire({
                            title: 'Good Job',
                            text: data.data,
                            type: "success",
                            showCancelButton: false,
                            confirmButtonText: "Ok",
                            reverseButtons: true,
                            }).then((result) => {
                                window.location.href = base_url+'wp-penjualan-admin';
                        })
                }else{
                    Swal.fire(
                        'Opps!',
                        ''+data.pesan+'',
                        'info'
                    )            
                    $('.loadingkonfimasi').removeClass('waitMe_container');
                        $('.waitMe').remove();
                }
                
            }
        });
    })
</script>
