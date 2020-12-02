<main class="site-main">

    <div class="columns container">
        <!-- Block  Breadcrumb-->

        <ol class="breadcrumb no-hide">
            <li><a href="#">Home </a></li>
            <li class="active">Contact</li>
        </ol><!-- Block  Breadcrumb-->

        <h2 class="page-heading">
            <span class="page-heading-title2">Konfirmasi Pembayaran</span>
        </h2>

        <div class="page-content" id="contact">
            <div class="col-md-12 box-authentication">
                <form id="FormValidasiKonfirmasi" enctype="multipart/form-data" method="POST" class="contact-form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <strong>No Pesanan *</strong>
                                <?php
                                if ($DataPenjuealan->data == null) : ?>
                                    <input type="text" name="no_pesanan" placeholder="Masukan No Pesanan..." required class="form-control" value="">
                                <?php else : ?>
                                    <select class="form-control" name="no_pesanan">
                                        <?php foreach ($DataPenjuealan->data as $row) : ?>
                                            <?php if($row->type_trx == "AMBIL"){
                                                $totalharga= $row->total_harga / 2;
                                            }else{
                                                $totalharga= $row->total_harga+$row->ongkir;
                                            } ?>
                                            <option <?= $this->session->userdata('id_trx_pembayaran') == $row->id_trx ? 'selected' : '' ?> value="<?= $row->id_trx ?>"> <?= strtoupper($row->id_trx) ?> - <?= number_format($totalharga) ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <strong>Nama Bank</strong>
                                <input type="text" name="nama_bank" onkeypress="return HurufNoEnter(event)" placeholder=" Masukan Bank Tempat Anda Transfer..." required class="form-control" value="">
                            </div>

                            <!-- <div class="col-md-6 col-xs-12">
                                <strong>Nama Lengkap *</strong>
                                <input type="text" name="nama_Customer" placeholder="Masukan Nama Lengkap..." required class="form-control" value="<?= $this->session->userdata('nama_customer') ?>">
                            </div> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <strong>Atas Nama *</strong>
                                <input type="text" name="atas_nama" onkeypress="return HurufNoEnter(event)" placeholder=" Masukan Nama Anda..." required class="form-control" value="">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <strong>No Rekening *</strong>
                                <input type="text" onkeypress="return NumberNoEnter(event)" name="no_rekening" placeholder="Masukan No Rekening..." required class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <strong>Nomer Rekening Tujuan</strong>
                                <select required name="no_rek_tujuan" placeholder="Masukan No Rekening Tujuan..." class="form-control">
                                    <?php foreach ($DataBank->data as $row) : ?>
                                        <option value="<?= $row->_id ?>"> <?= $row->no_rek ?>-<?= $row->atas_nama ?>-<?= $row->nama_bank ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <strong>Masukan Bukti Transfer *</strong>
                                <input required name="bukti_transfer" type="file" id="file-upload">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="button btn-block btn-click" style="display: block;">Konfirmasi Sekarang</button>
                        <button class="button btn-block btn-loading" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>
                    </div>
                </form>
            </div>


        </div>
    </div>


</main><!-- end MAIN -->

<script type="text/javascript">
        $('#FormValidasiKonfirmasi').submit(function(e){
            e.preventDefault(); 
                $('.btn-click').hide();
                $('.btn-loading').show();
                setTimeout(() => {
                    $.ajax({
                            url:base_url + '/save-konfirmasi',
                            type:"post",
                            data:new FormData(this),
                            processData:false,
                            contentType:false,
                            cache:false,
                            async:false,
                            success: function(data){
                            if(data.status=="berhasil"){
                                    Swal.fire({
                                        title: 'Good Job',
                                        text: data.pesan,
                                        type: "success",
                                        showCancelButton: false,
                                        confirmButtonText: "Ok",
                                        reverseButtons: true,
                                        }).then((result) => {
                                            window.location.href = base_url+'konfirmasipembayaran/1';
                                    })
                            }else{
                                    Swal.fire(
                                        'Opps!',
                                        ''+data.pesan+'',
                                        'info'
                                    )            
                                    $('.btn-click').show();
                                    $('.btn-loading').hide();
                            }
                            
                        }
                    });
                }, 3000);
                
        });
</script>