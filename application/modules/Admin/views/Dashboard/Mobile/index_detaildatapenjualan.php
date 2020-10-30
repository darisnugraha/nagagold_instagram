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

                                    <tr>
                                        <td>1 </td>
                                        <td><img src="https://hidupbanjaran.com/assets/images/NsiPic/product/2643f561c2b747415c5698466f7ff48f.jpeg"></td>
                                        <td>GIWANG TUSUK PAKU 375 </td>
                                        <td>1</td>
                                        <td>1.250.000</td>
                                    </tr>
                                    <tr>
                                        <td>2 </td>
                                        <td><img src="https://hidupbanjaran.com/assets/images/NsiPic/product/2643f561c2b747415c5698466f7ff48f.jpeg"></td>
                                        <td>GIWANG TUSUK PAKU 375 </td>
                                        <td>1</td>
                                        <td>1.250.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" nowrap> Total</td>
                                        <td> 2 </td>
                                        <td colspan="3" align="right">2.500.000</td>
                                    </tr>
                                </div>
                            </tbody>
                    </table>
                   
                </div>
                <div class="card user-data-card">
                   <div class="container text-center"> Form Pengambilan</div>
                   <form method="POST" id="formValidasiPenjualan" enctype="multipart/form-data">
                        <div class="card-body">
                            <label class="title mb-2"> Kode CUstomer </label>
                            <div class="input-group mb-3">
                                <input type="text" required class="form-control id_customer" onkeypress="return event.keyCode!=13" placeholder="Masukan Kode Customer" >
                                <div class="input-group-append">
                                    <a class="input-group-text" style="cursor: pointer;" id="btn_click">Cek</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="title mb-2"><span>Nama Customer</span>
                                <input class="form-control" required onkeypress="return event.keyCode!=13" placeholder="Masukan Nama Customer" name="nama_customer" required type="text" value="">
                            </div>
                            <div class="form-group">
                                <div class="title mb-2"><span>No Hp</span>
                                <input class="form-control" required onkeypress="return event.keyCode!=13" placeholder="Masukan No Hp" name="nama_customer" required type="text" value="">
                            </div>
                            <div class="form-group">
                                <div class="title mb-2"><span>Foto Bukti Pengambialan</span>
                                <input class="form-control" required  placeholder="Masukan No Hp" name="nama_customer" required type="file" accept="image/*;capture=camera">
                            </div>
                            <button class="btn btn-success w-100" type="submit">Validasi Penjualan</button>
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
    $('#btn_click').on('click',function(){
       var kode= $('.id_customer').val();
       alert(kode);
    })
    $('#formValidasiPenjualan').submit(function(e){

    })
</script>
