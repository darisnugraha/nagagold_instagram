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
            <li class="active"><a href="#"><?= $this->session->flashdata('title_form') ?></a></li>
        </ol><!-- Block  Breadcrumb-->

        <!-- <h2 class="page-heading">
                    <span class="page-heading-title2">Authentication</span>
                </h2> -->
        <?= $this->session->flashdata('PesanMemberLama') ?>
        <div class="page-content">
            <div class="row">
                <form method="post" id="form1" action="<?= base_url('ceklogin') ?>" autocomplete="off">
                    <div class="col-sm-12">
                        <div class="box-authentication" align="center">
                            <div class="form-group">
                                <br>
                                <br>
                                <br>
                                <br>
                                <button type="submit" class="button btn-block">Aktifasi Akun Anda Sekarang</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


</main><!-- end MAIN -->