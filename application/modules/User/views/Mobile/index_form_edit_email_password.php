<div class="page-content-wrapper">
    <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card user-info-card">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="user-profile mr-3">
                        <?php $nama = substr($this->session->userdata('nama_customer'), 0, 1) ?>
                        <div class="lingkaran">
                            <?= strtoupper($nama) ?>
                        </div>
                    </div>
                    <div class="user-info">
                        <h5 class="mb-0 text-white"><?= $this->session->userdata('nama_customer') ?></h5>
                        <p class="mb-0 text-white"><?= $this->session->userdata('no_hp') ?></p>
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group mb-3">
                            <input type="text" name="email" id="email" type="email" value="<?= $this->session->userdata('email') ?>" class="form-control" placeholder="Masukan Email Baru">
                            <div class="input-group-append">
                                <button class="btn btn-success verifikasi_email" type="button">Verifikasi Email</button>
                                <button class="btn btn-success btn-loading-email" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <div class="input-group mb-3">
                            <input type="text" name="no_hp" id="no_hp" type="number" value="<?= $this->session->userdata('no_hp') ?>" class="form-control" placeholder="Masukan No Hp">
                            <div class="input-group-append">
                                <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalkonfirmasi_otp" type="button">Ganti No Hp</button> -->
                                <button class="btn btn-success verifikasi_no_hp" style="display: block;" type="button">Verifikasi No Hp</button>
                                <button class="btn btn-success btn-loading-no-hp" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
<br>
<br>
<br>

<div class="modal fade" id="modalkonfirmasi_otp_hp" tabindex="-1" role="dialog" aria-labelledby="modalcekuserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalcekuserLabel">Otentifikasi Otp No Hp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form action="#" method="POST"> -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi OTP</label>
                        <input type="number" id="kode_otp_hp" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Masukan OTP">
                        <input type="hidden" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="no_hp_verifikasi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="kirim_verifikasi_no_hp btn btn-primary" tyle="display: block;">Konfirmasi</button>
                    <button class="button btn btn-primary btn-loading-no_hp" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>

                </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<div class="modal fade" id="modalkonfirmasi_otp_email" tabindex="-1" role="dialog" aria-labelledby="modalcekuserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalcekuserLabel">Otentifikasi Otp Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form action="#" method="POST"> -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi OTP</label>
                        <input type="number" id="kode_otp_email" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="Masukan OTP">
                        <input type="hidden"  class="form-control" id="email_verifikasi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="kirim_verifikasi_email btn btn-primary" style="display: block;">Konfirmasi</button>
                    <button class="button btn btn-primary btn-loading-verifikasiemail" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>

                </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<script>
window.history.replaceState('','',window.location.href);
// Verifikasi Email 
    $('.verifikasi_email').on('click',function(){
        var id= $('#email').val();
        // console.log(id);
        $('.verifikasi_email').hide();
        $('.btn-loading-email').show();
        $('#kode_otp_email').val('');

        $.ajax({
            url: base_url + "verifikasi-email",
            dataType: 'json',
            method: 'POST',
            data: {
                email: id
            },
            success: function(respons) {
                // console.log(respons);
                if(respons.status=="berhasil"){
                    Swal.fire({
                    title: "Success !",
                    text: respons.pesan,
                    type: "success",
                    // showCancelButton: true,
                    confirmButtonText: "Ya",
                    // cancelButtonText: "Belum",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.value) {
                        $('#modalkonfirmasi_otp_email').modal('show');
                    }
                });
                $('.btn-loading-email').hide();
                $('.verifikasi_email').show();

                $('#email_verifikasi').val(id);
                }else{
                    Swal.fire(
                        'Opps!',
                        ''+respons.pesan+'',
                        'info'
                    )   
                    $('.btn-loading-email').hide();
                    $('.verifikasi_email').show(); 
                }
            }
        })
    })

    $('.kirim_verifikasi_email').on('click', function(){
        $('.kirim_verifikasi_email').hide();
        $('.btn-loading-verifikasiemail').show();
        var kode_otp = $('#kode_otp_email').val();
        var email    = $('#email_verifikasi').val();
        $.ajax({
            url: base_url + "validasi-otp",
            dataType: 'json',
            method: 'POST',
            data: {
                email: email,
                kode_otp: kode_otp,
                type: "email"
            },
            success: function(respons) {
                // console.log(respons);
                if(respons.status=="berhasil"){
                    Swal.fire({
                    title: "Success !",
                    text: respons.pesan,
                    type: "success",
                    // showCancelButton: true,
                    confirmButtonText: "Ya",
                    // cancelButtonText: "Belum",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.value) {
                        $('#modalkonfirmasi_otp_email').modal('hide');
                        $('.kirim_verifikasi_email').show();
                         $('.btn-loading-verifikasiemail').hide();
                    }
                });
                }else{
                    $('.kirim_verifikasi_email').show();
                    $('.btn-loading-verifikasiemail').hide();
                    Swal.fire(
                        'Opps!',
                        ''+respons.pesan+'',
                        'info'
                    )    
                }
            }
        });
    })

// verifikasi No HP
    $('.verifikasi_no_hp').on('click',function(){
        $('#kode_otp_email').val('');
        var id= $('#no_hp').val();
        // console.log(id);
        $('.verifikasi_no_hp').hide();
        $('.btn-loading-no-hp').show();

        $.ajax({
            url: base_url + "verifikasi-no-hp",
            dataType: 'json',
            method: 'POST',
            data: {
                no_hp: id
            },
            success: function(respons) {
                // console.log(respons);
                if(respons.status=="berhasil"){
                    Swal.fire({
                    title: "Success !",
                    text: respons.pesan,
                    type: "success",
                    // showCancelButton: true,
                    confirmButtonText: "Ya",
                    // cancelButtonText: "Belum",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.value) {
                        $('#modalkonfirmasi_otp_hp').modal('show');
                    }
                });
                $('.btn-loading-no-hp').hide();
                $('.verifikasi_no_hp').show();
                $('#no_hp_verifikasi').val(id);
                  
                }else{
                    Swal.fire(
                        'Opps!',
                        ''+respons.pesan+'',
                        'info'
                    )    
                    $('.btn-loading-no-hp').hide();
                    $('.verifikasi_no_hp').show();

                }
            }
        })
    })

    $('.kirim_verifikasi_no_hp').on('click', function(){
        var kode_otp = $('#kode_otp_hp').val();
        var no_hp    = $('#no_hp_verifikasi').val();
        // console.log(kode_otp);
        // console.log(no_hp);
        $('.kirim_verifikasi_no_hp').hide();
        $('.btn-loading-no_hp').show();
        $.ajax({
            url: base_url + "validasi-otp",
            dataType: 'json',
            method: 'POST',
            data: {
                no_hp: no_hp,
                kode_otp: kode_otp,
                type: "no_hp"
            },
            success: function(respons) {
                // console.log(respons);
                if(respons.status=="berhasil"){
                    Swal.fire({
                    title: "Success !",
                    text: respons.pesan,
                    type: "success",
                    // showCancelButton: true,
                    confirmButtonText: "Ya",
                    // cancelButtonText: "Belum",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.value) {
                        $('#kode_otp_hp').val('');
                        $('#modalkonfirmasi_otp_hp').modal('hide');
                        $('.kirim_verifikasi_no_hp').show();
                        $('.btn-loading-no_hp').hide();
                    }
                });
                }else{
                    $('.kirim_verifikasi_no_hp').show();
                    $('.btn-loading-no_hp').hide();
                    Swal.fire(
                        'Opps!',
                        ''+respons.pesan+'',
                        'info'
                    )    
                }
            }
        });
    })
    
</script>