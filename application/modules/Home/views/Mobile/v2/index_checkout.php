<br>
<br>
<div class="container">
    <!-- Checkout Wrapper-->
    <form id="form-checkout" action="<?= base_url('complate_checkout') ?>" method="POST">
        <div class="">
            <!-- Billing Address-->
            <div class="billing-information-card mb-4">
                <div class="card shipping-method-choose-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Billing Details</h6>
                    </div>
                </div>
                <input class="input form-control" placeholder="Nama Lengkap" name="nama_customer" value="<?= $this->session->userdata('nama_customer') ?>" id="first_name" type="hidden">

                <div class="card user-data-card">
                    <div class="card-body">
                        <div class="shipping-method-choose">
                            <?php
                            if ($DaftarALamat->status == "berhasil") : ?>
                                <?php if ($DaftarALamat->data == null) : ?>
                                    <p>Alamat Kosong Tambah Alamat Terlebih Dahulu Untuk Melanjutkan Checkout</p>
                                    <input type="hidden" name="alamat" value="kosong">
                                <?php else : ?>
                                    <ul>
                                        <?php
                                        foreach ($DaftarALamat->data as $dataalamat) :
                                        ?>
                                            <?php if ($dataalamat->status_default == 1) :
                                                $id_kec = $dataalamat->kode_kecamatan;
                                            ?>
                                                <li>
                                                    <input required id="<?= $dataalamat->_id ?>" required check type="radio" value="<?= $dataalamat->_id ?>" name="alamat_customer" checked>
                                                    <label for="<?= $dataalamat->_id ?>"><span>
                                                            <table>
                                                                <tr>
                                                                    <td colspan="3">Alamat Utama</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Customer</td>
                                                                    <td>&nbsp;:&nbsp;</td>
                                                                    <td>&nbsp;<?= $this->session->userdata('nama_customer'); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>No Hp</td>
                                                                    <td>&nbsp;:&nbsp;</td>
                                                                    <td>&nbsp;<?= $this->session->userdata('no_hp'); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alamat Lengkap</td>
                                                                    <td>&nbsp;:&nbsp;</td>
                                                                    <td>
                                                                        <?= $dataalamat->alamat_lengkap ?>
                                                                        <?= $dataalamat->nama_kecamatan ?>
                                                                        <?= $dataalamat->nama_kota ?>
                                                                        <?= $dataalamat->kode_pos ?>
                                                                        <?= $dataalamat->nama_provinsi ?>
                                                                </tr>
                                                            </table>
                                                        </span></label>
                                                    <div class="check"></div>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <br>
                        <a class="btn btn-success w-100" class="pointer" href="<?= base_url('wp-daftar-alamat') ?>">Ganti
                            Alamat</a>
                    </div>
                </div>
            </div>
            <!-- Shipping Method Choose-->
            <div class="shipping-method-choose mb-4">
                <div class="card shipping-method-choose-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Pesanan Anda </h6>
                    </div>
                </div>
                <div class="card shipping-method-choose-card">
                    <div class="card-body">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Qty</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                // $id_checkout = $rowbarang->id_checkout;
                                $total = 0;
                                $no = 1;
                                $total_harga = 0;
                                $berat = 0;
                                $data_barang = $this->session->userdata('data_barang');
                                foreach ($data_barang as $row) :
                                    $total_harga += $row['harga'];
                                    $total += $row['harga'];
                                    $berat += $row['berat'];
                                ?>
                                    <input value="<?= $this->session->userdata('nama_customer') ?>" placeholder="Masukan Nama Depan" name="nama_lengkap" type="hidden">
                                    <input value="<?= $this->session->userdata('email') ?>" placeholder="Masukan Email" name="email" type="hidden">
                                    <input type="hidden" name="kode_barcode[]" value="<?= $row['kode_barcode'] ?>">
                                    <!-- <input type="hidden" name="qty[]" value="<?= $row->qty ?>"> -->
                                    <tr>
                                        <th scope="row"> <?= $no++ ?></th>
                                        <td> <a href="<?= base_url('produk/' . encrypt_url($row['harga'])) ?> "> <?= $row['nama_barang'] ?> </a> 
                                        <br>
                                        <small class="cart_ref">Kode Barang : <?= $row['kode_barcode'] ?></small><br>
                                        <small>Berat : <?= $row['berat'] ?> G</small><br>
                                        <small>Kadar: <?= $row['kadar'] ?></small><br>
                                        <small>Ongkos Produksi : <?= number_format($row['ongkos_produksi']) ?></small>
                                        </td>
                                        <td>
                                            <div class="p-title-price">
                                                <p class="sale-price">Rp.<?= number_format($row['harga']) ?></p>
                                            </div>
                                        </td>
                                        <td>1</td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="2" nowrap> Total Berat</td>
                                    <td colspan="2" align="right"><span> <?= $berat ?> G</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2" nowrap> Total</td>
                                    <td colspan="2" align="right"><span>Rp. <?= number_format($total_harga) ?> </span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Cart Amount Area-->
            <input type="hidden" class="totalharga" name="total_harga" value="<?= number_format($total) ?>">
            <input type="hidden" name="total_harga2" value="<?= $total ?>">
            <input type="hidden" class="totalhargaawal" value="<?= number_format($total) ?>">
            <input type="hidden" class="jenis_kurir" name="jenis_kurir">
            <input type="hidden" class="harga_kurir" name="harga_kurir">
            <input type="hidden" class="alamat_toko" name="alamat_toko">
            <input type="hidden" class="nominal_potongan" name="nominal_potongan">
            <input type="hidden" class="totaldpku" name="total_dp">
            <input class="form-control" id="berat" type="hidden" name="berat" value="<?= $berat ?>" />



            <div class="shipping-method-choose mb-4">
                <div class="card shipping-method-choose-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Pengiriman</h6>
                    </div>
                </div>
                <div class="card shipping-method-choose-card">
                    <div class="card-body">
                        <div class="shipping-method-choose">
                            <ul>
                                <label><input id="toko" required onclick="funtoko('<?= $total ?>')" name="type_pengambilan" type="radio" value="Ambil Ditoko" name="selector">
                                    Ambil Ditoko ?</label>
                                <div class="check"></div>
                                <div class="tampiltoko"></div>
                                <label><input id="kurir" onclick="funkurir()" name="type_pengambilan" value="Antar Dengan Kurir" type="radio" name="selector">
                                    Antar Dengan Kurir ?</label><br><span id="text" style="display:none"> Loading ...</span>
                                <div class="tampilpengiriman"></div>
                                <span id="text2" style="display:none"> Loading ...</span>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <!-- <div class="card coupon-card mb-3" id="buttonvoucher1">
                    <div class="card-body">
                        <div class="apply-coupon">
                            <h6 class="mb-0">Have a coupon?</h6>
                            <p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p>
                            <div class="coupon-form">
                                <form action="#">
                                    <select class="form-control kode_voucher" name="kode_voucher">
                                        <?php if ($DataVoucher->status == "kosong") : ?>
                                            <option>Voucher Kosong</option>
                                        <?php else : ?>
                                            <?php foreach ($DataVoucher->data  as $voucher) : ?>
                                                <option value="<?= $voucher->kode_voucher ?>"> <?= $voucher->nama_voucher ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <button class="btn btn-primary applycoucher" type="button">Apply</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="card coupon-card mb-3" id="buttonvoucher1">
                    <div class="card-body">
                        <div class="apply-coupon">
                            <h6 class="mb-0">Pembayaran Via Transfer</h6>
                            <!-- <p class="mb-2">Pembayaran Via Transfer</p> -->
                            <div class="coupon-form">
                                <!-- <form action="#"> -->
                                <select class="form-control kode_voucher" name="kode_voucher">
                                    <?php
                                    foreach ($DataBank->data as $bank) : ?>
                                        <option value="<?= $bank->_id ?>">
                                            <?= $bank->no_rek ?> - <?= $bank->atas_nama ?> - <?= $bank->nama_bank ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <button class="btn btn-primary applycoucher" type="button">Apply</button> -->
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card cart-amount-area">
                    <div class="card shipping-method-choose-title-card bg-success">
                        <div class="card-body">
                            <h6 class="text-center mb-0 text-white">Total Pembayaran</h6>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <table class="table">
                            <thead>
                                <!-- <tr>
                                    <th scope="col">Kode Unik</th>
                                    <th scope="col"><?= $DataCheckout->no_unik ?></th>
                                </tr> -->
                                
                                <tr>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Rp.<?= number_format($total_harga) ?></th>
                                </tr>
                                <tr id="ongkirbarang">

                                </tr>
                                <tr style="display: none;" id="view_dp">
                                    <th scope="col">Total Dp Yang Harus Dibayar</th>
                                    <th scope="col">Rp.<span id="total_dp"></span></th>
                                </tr>
                                <tr class="displayvoucher">
                                </tr>
                                <tr>
                                    <th scope="col">Total Pembayaran</th>
                                    <th scope="col">
                                        <h5 class="total-price mb-0">Rp.<span class="counter" id="jum_harga"><?= number_format($total_harga) ?></span>
                                    </th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button onclick="validasiCheckout();" class="btn btn-success btn-block">Bayar Sekarang</button>
                                    </td>
                                </tr>
                            </thead>

                        </table>
                        <!-- <h5 class="total-price mb-0">Rp.<span class="counter" id="jum_harga"><?= substr($DataCheckout->jum_harga, 0, strlen($DataCheckout->jum_harga) - 3) ?>.<u><?= substr($DataCheckout->jum_harga, -3) ?></span></h5>
                        <button onclick="$('.loaderform').show();" class="btn btn-success" type="submit">Bayar Sekarang</button> -->
                    </div>
                </div>
            </div>
    </form>
</div>
<br>
<br>

<script>
    function validasiCheckout() {
        var applicationForm = document.getElementById("form-checkout");
        if (applicationForm.checkValidity()) {
            $('.loaderform').show();
            applicationForm.submit();
        } else {
            applicationForm.reportValidity();
        }
    }

    $('.applycoucher').on('click', function() {
        // var id = $(this).val();
        var id = $('.kode_voucher').val();
        var total = $('.totalhargaawal').val();
        // console.log(id);
        $.ajax({
            url: "<?= base_url('cekvoucher') ?>",
            dataType: 'json',
            method: 'POST',
            data: {
                kode_voucher: id,
                total_harga: total
            },
            success: function(respons) {
                $('.loadingtext').show();
                if (respons.status == "kosong") {
                    Swal.fire(
                        'Opps!',
                        'Koneksi Bermasalah Coba Beberapa Saat Lagi!',
                        'info'
                    )
                } else {
                    $('.displayvoucher').html("");
                    $.each(respons.data, function(index, element) {
                        // console.log(element);
                        if (element.status_voucher == "READY") {
                            $('.displayvoucher').append(
                                ` <th scope="col">Voucher</th>
                             <th scope="col"><span class="totalvoucher">Rp.` + element.nominal_potongan +
                                `</span></th>`
                            );
                            $('.loadingtext').hide();

                            var totalharga = $('.totalharga').val();
                            console.log(totalharga);
                            var tot = totalharga.replace(",", "");
                            // console.log(tot);
                            $('.nominal_potongan').val(element.nominal_potongan);
                            var subtot = parseFloat(tot) - parseFloat(element
                                .nominal_potongan);
                            document.getElementById("jum_harga").innerHTML = subtot
                                .toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
                            // ('.buttonvoucher').append('sam');
                            var x = document.getElementById("buttonvoucher1");
                            if (x.style.display === "none") {
                                x.style.display = "block";
                            } else {
                                x.style.display = "none";
                            }
                            $('.totalharga').val(Math.round(subtot).toString().replace(
                                /(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
                        } else {
                            $('.displayvoucher').append(
                                `<td>Voucher</td>
                            <td><span class="totalvoucher">Voucher Tidak Dapat Digunakan</span></td>`
                            );
                        }

                    })
                }
            }
        });
    });

    function funkurir() {
        $('#view_dp').hide();
        $('.totaldpku').val(0);
        var checkBox = document.getElementById("kurir");
        var text = document.getElementById("text");
        if (checkBox.checked == true) {
            text.style.display = "block";
        }
        $('.tampiltoko').html("");
        $.ajax({
            url: base_url + "cekongkir",
            dataType: 'json',
            method: 'POST',
            data: {
                kode_kecamatan: '<?= $id_kec ?>',
                berat: '<?= $berat ?>'
            },
            success: function(respons) {
                console.log(respons.pesan);
                if (respons.status == "koneksi") {
                    console.log('NULL KAN');
                } else {
                    if (respons.status == "berhasil") {
                        //     $('.tampilpengiriman').html("");
                        //     $('.tampilpengiriman').append(`
                        // <label><input  id="toko" onclick="funtoko()"  name="type_pengambilan" type="radio"  value="Ambil Ditoko" name="selector">
                        //     Ambil Ditoko ?</label>
                        //     <div class="check"></div> 
                        //     <label><input checked  id="kurir" onclick="funkurir()" name="type_pengambilan"
                        //             value="Antar Dengan Kurir" type="radio" name="selector" >
                        //             Antar Dengan Kurir ?</label><br><span id="text" style="display:none">  Loading ...</span>
                        // `);
                        var text = document.getElementById("text");
                        text.style.display = "none";
                        $.each(respons.data, function(index, element) {
                            $.each(element.costs, function(index, detail) {
                                $.each(detail.cost, function(index, detailharga) {
                                    var harga = '';
                                    if (element.code == "tiki") {
                                        harga = detailharga.etd + ' Hari' + '';
                                    } else if (element.code == "J&T") {
                                        harga = detailharga.etd + ' 2-3 Hari' + '';
                                    } else {
                                        harga = detailharga.etd;
                                    }
                                    var service = '';
                                    if (element.code == "pos") {
                                        if (detail.service == "Paket Kilat Khusus") {
                                            service = 'Kilat';
                                        }
                                        if (detail.service ==
                                            "Express Next Day Barang") {
                                            service = 'Expres';
                                        }
                                    } else {
                                        service = detail.service;
                                    }

                                    $('.tampilpengiriman').append(`
                                <label><input type="radio" required onclick="funchitungtotal('` + element.code + `','` +
                                        detailharga.value + `')" data="` + service + `"   value="Ambil Ditoko" name="selector">
                                    ` + element.code.toUpperCase() + ` - ` + service + ` - Rp.` + detailharga.value
                                        .toString().replace(
                                            /(\d)(?=(\d{3})+(?!\d))/g, '$1,') +
                                        ` ` + harga + `</label>
                                    <div class="check"></div>
                                `);
                                })
                            })
                        })
                        $('.tampilpengiriman').append(`
                            <br>
                            <textarea id="checkout-mess" class="form-control" name="catatan" placeholder="Masukan Catatan Penjual"></textarea>
                    `);
                    } else {
                        $('.tampilpengiriman').html("");
                        $('.tampilpengiriman').append(`` + respons.pesan + ``);
                    }
                }
            }
        })
    }

    function funchitungtotal(kode, harga) {
        // var id=$(this).attr('data');


        $('#ongkirbarang').html(``);
        $('#ongkirbarang').append(`
            <th>Ongkos Kirim</th>
            <th>Rp.` + harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + `</th>
        `);
        $('.jenis_kurir').val(kode);
        $('.harga_kurir').val(harga);
        var subtotal = '<?= $total ?>';
        var hasil = parseInt(subtotal) + parseInt(harga);
        $('.totalharga').val(hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
        // $('#jum_harga').val(hasil);
        document.getElementById("jum_harga").innerHTML = hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }

    function funtoko(jml) {
        var checkBox = document.getElementById("toko");
        var text = document.getElementById("text");
        var text2 = document.getElementById("text2");

        $('#view_dp').show();
        var total = parseInt(jml) * parseInt(50) / parseInt(100);
        $('.totaldpku').val(total);
        document.getElementById("total_dp").innerHTML = total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');

        if (checkBox.checked == true) {
            text.style.display = "none";
            text2.style.display = "block";
            $.ajax({
                url: base_url + "getAlamatToko",
                dataType: 'json',
                method: 'POST',
                success: function(respons) {
                    if (respons.status == "berhasil") {
                        var count = respons.data.length;
                        var datalamat = respons.data;
                        var no = 3;
                        $('.tampiltoko').html("");
                        for (var i = 0; i < count; i++) {
                            $('.tampiltoko').append(`
                            <label><input type="radio" required onclick="pilihalamat('` + datalamat[i].kode_toko + `');"  value="` + datalamat[i]._id + `" id="radio` + no + `" name="selector">
                            ` + datalamat[i].alamat_lengkap + ` ` + datalamat[i].nama_kecamatan + ` ` + datalamat[i].nama_kota + `  ` + datalamat[i].kode_pos + ` ` + datalamat[i].nama_provinsi + ` 
                            </label>
                            <div class="check"></div>
								`);
                        }
                        no++
                        text2.style.display = "none";
                    } else {
                        $('.tampiltoko').html("");
                        $('.tampiltoko').append(`Oops !!! Koneksi Bermasalah Coba Cek Koneksi Anda Dan Refres Halaman Ini`);
                        var text = document.getElementById("text2");
                        text.style.display = "none";
                    }
                },
                error: function(e, log) {
                    // $('.tampilpengiriman').html("");
                    // $('.tampilpengiriman').append(`Oops !!! Daftar alamat tujuan anda belum diisi silahkan isi daftar alamat anda pada menu daftar alamat <a href="<?= base_url('daftar-alamat') ?>">Disini</a> lalu centang alamat tujuan anda untuk menjadikan alamat utama`);
                    // var text = document.getElementById("text");
                    // text.style.display = "none";

                }
            })
        }
        $('#ongkirbarang').html('');
        var subtotal = '<?= $total ?>';
        $('.totalharga').val(subtotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
        document.getElementById("jum_harga").innerHTML = subtotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        $('.tampilpengiriman').html("");
    }

    function pilihalamat(id) {
        $('.alamat_toko').val(id);
    }
</script>