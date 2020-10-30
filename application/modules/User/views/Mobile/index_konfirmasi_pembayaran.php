<div class="page-content-wrapper">
    <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card shipping-method-choose-title-card bg-success">
                <div class="card-body">
                    <h6 class="text-center mb-0 text-white">Konfirmasi Pembayaran</h6>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">
                    <form id="FormValidasiKonfirmasi" autocomplete="off"  method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="title mb-2"><span>Pilih Nomer Pesanan</span></div>
                            <?php
                                if ($DataPenjuealan->data == null) : ?>
                                    <input type="text" name="no_pesanan" placeholder="Masukan No Pesanan..." required class="form-control" value="">
                                <?php else : ?>
                                <select class="form-control" name="no_pesanan">
                                    <?php 
                                    foreach ($DataPenjuealan->data as $row) : ?>
                                        <?php if($row->type_trx == "AMBIL"){
                                                $totalharga= $row->total_harga / 2;
                                            }else{
                                                $totalharga= $row->total_harga+$row->ongkir;
                                            } ?>
                                        <option value="<?= $row->id_trx ?> - <?= $row->total_harga ?>"> <?= strtoupper($row->id_trx) ?> - <?= number_format($totalharga) ?>  </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <div class="title mb-2"><span>Nama Bank</span></div>
                            <input class="form-control" onkeypress="return HurufNoEnter(event)" required placeholder="Masukan Nama Bank" name="nama_bank" type="text">
                        </div>
                        <div class="form-group">
                            <div class="title mb-2"><span>Atas Nama</span></div>
                            <input class="form-control" onkeypress="return HurufNoEnter(event)" required placeholder="Masukan Nama Pemilik Rekening" name="atas_nama" type="text">
                        </div>
                        <div class="form-group">
                            <div class="title mb-2"><span>No Rekening Anda</span></div>
                            <input class="form-control" onkeypress="return NumberNoEnter(event)" required placeholder="Masukan No Rekening" name="no_rekening" type="number">
                        </div>

                        <div class="form-group">
                            <div class="title mb-2"><span>Pilih Rekening Tujuan</span></div>
                            <select class="form-control" name="no_rek_tujuan">
                                <?php foreach ($DataBank->data as $bank) : ?>
                                    <option value="<?= $bank->_id ?>">
                                        <?= $bank->no_rek ?> - <?= $bank->atas_nama ?> - <?= $bank->nama_bank ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="title mb-2"><span>Bukti Transfer</span></div>
                            <input class="form-control" required name="bukti_transfer" required  type="file">
                        </div>
                        <br>
                        <button class="btn btn-success w-100 btn-click1" style="display: block;" type="submit">Konfirmasi Sekarang</button>
                        <button class="btn btn-success btn-block btn-loading1" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<script type="text/javascript">
        $('#FormValidasiKonfirmasi').submit(function(e){
            e.preventDefault(); 
                $('.btn-click1').hide();
                $('.btn-loading1').show();
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
                                $('.btn-click1').show();
                                $('.btn-loading1').hide();
                        }
                    }
                });
                }, 3000);
                
        });
</script>