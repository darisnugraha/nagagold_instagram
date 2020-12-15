<main class="site-main">

    <div class="columns container">
        <!-- Block  Breadcrumb-->

        <ol class="breadcrumb no-hide">
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Login dan Aktivasi Akun</a></li>
        </ol><!-- Block  Breadcrumb-->

        <!-- <h2 class="page-heading">
                    <span class="page-heading-title2">Authentication</span>
                </h2> -->

        <div class="page-content">
            <div class="row">

                <div class="col-sm-6">
                    <div class="box-authentication">
                        <h3>Sudah Punya AKun ?</h3>
                        <p>Login Disini.</p>
                        <?= $this->session->flashdata('PesanLogin') ?>
                        <?= form_error('user_id', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= form_error('pass_key', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <form method="post" id="form1" action="<?= base_url('ceklogin') ?>" autocomplete="off">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="no_hp_or_email" required placeholder="Masukan No Hp / Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" required autocomplate="off" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button btn-block">Login</button>
                            </div>
                        </form>
                        <p>Belum Punya Akun Silahkan Daftar <a href="<?= base_url('wp-daftar-member') ?>">Disini</a></p>
                        <p>Lupa Password <a href="<?= base_url('forgetpassword') ?>">Disini</a></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box-authentication">
                        <h3>Aktivasi Member Lama</h3>
                        <p>Silahkan masukan kode member untuk aktifiasi akun lama.</p>
                        <?= $this->session->flashdata('Pesan') ?>
                        <form method="post" id="form1" action="<?= base_url('cekmemberlama') ?>" autocomplete="off">
                            <div class="form-group">
                                <label>Kode Member</label>
                                <input type="textx" required name="kode_customer" placeholder="Masukan Kode Member" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button btn-block">Aktivasi Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main><!-- end MAIN -->