<style>
.required {
    color: red;
}
</style>
<main class="site-main">

    <div class="columns container">
        <!-- Block  Breadcrumb-->
        <ol class="breadcrumb no-hide">
            <li><a href="#">Home</a></li>
            <li class="active"><?= $nama_form ?></li>
        </ol><!-- Block  Breadcrumb-->

        <!-- <h2 class="page-heading">
                    <span class="page-heading-title2">Authentication</span>
                </h2> -->
        <?= $this->session->flashdata('PesanMemberLama') ?>
        <div class="page-content">
            <div class="row">
                <form method="post" id="form1" action="<?= base_url('simpanregisteruser') ?>" autocomplete="off">
                    <div class="col-sm-6">
                        <div class="box-authentication">
                            <h3><?= $this->session->flashdata('title_form') ?></h3>
                            <?= $this->session->flashdata('PesanLogin') ?>
                            <?= form_error('user_id', '<div class="alert alert-danger" role="alert">','</div>'); ?>
                            <?= form_error('pass_key', '<div class="alert alert-danger" role="alert">','</div>'); ?>
                            <div class="form-group">
                                <label>Nama Lengkap <span class="required"> * </span></label>
                                <input type="hidden" value="<?= $this->session->userdata('status_form') ?>"
                                    name="status_form" class="form-control">
                                <input type="hidden" value="<?= $this->session->userdata('kode_customer_lama'); ?>"
                                    name="kode_customer" class="form-control">
                                <input type="text" value="<?= $this->session->userdata('nama_customer_lama'); ?>"
                                    required name="nama_customer" required placeholder="Masukan Nama"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No Whatsapp <span class="required"> * </span></label>
                                <input type="number"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value="<?= $this->session->userdata('no_hp_lama'); ?>" required name="no_hp"
                                    required placeholder="Masukan No Hp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email"
                                    value="<?= $this->session->userdata('email_lama'); ?>"  name="email"
                                 placeholder="Masukan Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nik <span class="required"> * </span></label>
                                <input type="text" value="<?= $this->session->userdata('nik_lama'); ?>" required
                                    name="nik" required placeholder="Masukan Nik" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir <span class="required"> * </span></label>
                                <input type="date" id="tanggal_lahir" value="<?= $this->session->userdata('tgl_lahir_lama'); ?>"
                                    name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pilih Provinsi <span class="required"> * </span></label>
                                <select id="provinsi" name="provinsi" class="form-control select2" required>
                                    <option value="">Pilih Provinsi</option>
                                    <?php  $count = count($Provinsi->data);
                                            $dataprovinsi = $Provinsi->data;
                                            for($i=0; $i<$count; $i++ ): ?>
                                    <option
                                        <?=  explode('-',$this->session->userdata('provinsi_lama'))[0]  == $dataprovinsi[$i]->province_id ? 'selected' : '' ?>
                                        value="<?= $dataprovinsi[$i]->province_id ?>-<?= $dataprovinsi[$i]->province?>">
                                        <?= $dataprovinsi[$i]->province?> </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="kota_lama"
                                    value="<?=  explode('-',$this->session->userdata('kota_lama'))[0]  ?>">
                                <label>Pilih Kota / Kabupaten <span class="required"> * </span></label>
                                <select id="kota" name="kota" class="form-control select2" required>
                                    <option value="">Pilih Kota / Kabupaten</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box-authentication">
                            <h3>&nbsp;</h3>
                            <!-- <h3>Lupa Password</h3>
                                <p>Jika Anda lupa password masukan email.</p> -->
                            <div class="form-group">
                                <input type="hidden" id="kecamatan_lama"
                                    value="<?= explode('-',$this->session->userdata('kecamatan_lama'))[0]  ?>">
                                <label>Pilih Kecamatan <span class="required"> * </span></label></label>
                                <select id="kecamatan" name="kecamatan" class="form-control select2" required>
                                    <option>Pilih Kecamatan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kode Pos </label>
                                <input type="text" value="<?= $this->session->userdata('kode_poss_lama'); ?>" 
                                    name="kode_pos" placeholder="Masukan Kode Pos" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Masukan Alamat Lengkap <span class="required"> * </span></label>
                                <textarea required class="form-control" name="alamat1"
                                    placeholder="Masukan Alamat Lengkap"><?= $this->session->userdata('alamat1_lama'); ?></textarea>
                            </div>
                            <!-- form-group has-success -->
                            <div id="pesaneror" class="form-group">
                                <label class="control-label">Masukan Password <span class="required"> *
                                    </span></label></label>
                                <input type="password" class="form-control" name="password" id="pass1"
                                    placeholder="Masukan Password" aria-describedby="helpBlock2">
                            </div>
                            <div id="pesaneror2" class="form-group">
                                <label class="control-label">Ulangi Password <span class="required"> * </span></label>
                                <input type="password" required id="pass2" name="retype_password" class="form-control"
                                    placeholder="Ulangi Password" name="password">
                                <span style="display: none" id="password_salah1" class="help-block">Password Tidak
                                    Sama</span>
                                <span style="display: none" id="password_salah2" class="help-block">Good Job</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button btn-block"><?= $nama_button ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</main><!-- end MAIN -->
<script>
$( document ).ready(function() {
    var date = new Date();
    var day = date.getDate();
    var month = ("0" + (date.getMonth() + 1)).slice(-2)
    var thisDay = date.getDay();
    var tahun = date.getFullYear();
    console.log(tahun+'-'+month+'-'+day);
    document.getElementById("tanggal_lahir").defaultValue = tahun+'-'+month+'-'+day;
});
</script>
<script src="<?= base_url('assets/module/register/app.js') ?>"></script>