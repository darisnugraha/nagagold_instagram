<main class="site-main">

            <div class="columns container">
                <!-- Block  Breadcrumb-->
                        
                <ol class="breadcrumb no-hide">
                    <li><a href="#">Home    </a></li>
                    <li class="active">Estimasi Harga Penjualan</li>
                </ol><!-- Block  Breadcrumb-->

                <h2 class="page-heading">
                    <span class="page-heading-title2">Estimasi HargaPenjualan</span>
                </h2>

                <div class="page-content" id="contact">
                <div class="col-md-12 box-authentication">
                        <form action="#" id="table_pengajuan_penjualan" enctype="multipart/form-data" method="POST" class="contact-form">
                        <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <strong>Kode Barcode *</strong>
                                        <input type="text" onkeypress="return NumberNoEnter(event)" name="kode_barcode" id="kode_barcode_penjualan"  placeholder="Masukan Kode Barcode..." class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <strong>Nama Lengkap *</strong>
                                        <input type="text" onkeypress="return HurufNoEnter(event)" name="nama_Customer" placeholder="Masukan Nama Lengkap..."  class="form-control" value="<?= $this->session->userdata('nama_customer') ?>">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <strong>No Hp *</strong>
                                        <input type="text" onkeypress="return NumberNoEnter(event)" name="no_rekening_pembeli" placeholder="Masukan No Hp..."  class="form-control" value="<?= $this->session->userdata('no_hp') ?>">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                         <input type="button" id="caribarcodebarang" class="button btn-block" value="Cek Estimasi Penjualan">
                                        <!-- <button id="caribarcodebarang" name="no_rekening_pembeli" placeholder="Masukan No Hp..."  class="form-control button btn-block" > -->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <table class="table table-bordered " id="tbl_pengajuan">
                                            <thead>
                                            <tr>
                                                <td> Kode Barcode </td>
                                                <td> Nama Barang </td>
                                                <td> Nama Kategori </td>
                                                <td> Nama Jenis </td>
                                                <td> Berat </td>
                                                <td> Kadar </td>
                                                <td> Estimasi Harga </td>
                                            </tr>
                                            </thead>
                                            <tbody class="tbl_pengajuan_penjualan">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <br>
                                    <!-- <div class="form-group">
                                        <div class="col-md-12 col-xs-12">
                                            <input type="file" class="form-control" accept="image/png, image/jpeg">
                                        </div> 
                                    </div>  -->
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-12">
                                            <!-- <button type="submit" class="button btn-block">Ajukan Penjualan</button> -->
                                        </div> 
                                    </div> 
                                </div>
                              
                            </div>
                                <input type="hidden" name="DataBarangPenjualan" id="DataBarangPenjualan">
                        </form>
                    </div>


                </div>
            </div>


        </main><!-- end MAIN -->
      
        <!-- <script>
                $("#table_pengajuan_penjualan").submit(function(e) {
                var form = this;
                var temporary_tbl = $('table#tbl_pengajuan tbody tr').get().map(function(row) {
                    return $(row).find('td').get().map(function(cell) {
                        return $(cell).html();
                    });
                });
                $("#tbl_pengajuan").val(JSON.stringify(temporary_tbl));
            });

           
        </script> -->
     