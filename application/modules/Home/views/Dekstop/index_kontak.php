<main class="site-main">

    <div class="columns container">
        <!-- Block  Breadcrumb-->

        <ol class="breadcrumb no-hide">
            <li><a href="#">Home </a></li>
            <li class="active">Contact</li>
        </ol><!-- Block  Breadcrumb-->

        <h2 class="page-heading">
            <span class="page-heading-title2">Contact Us</span>
        </h2>

        <div class="page-content" id="contact">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-subheading">CONTACT FORM</h3>
                    <div class="contact-form-box">
                        <form action="#" id="FormValidasi">
                            <div class="form-selector">
                                <label>Email address</label>
                                <input type="text" required id="email" placeholder="Masukan Email" class="form-control input-sm">
                            </div>

                            <div class="form-selector">
                                <label>Message</label>
                                <textarea id="message" required placeholder="Pesan" class="form-control input-sm"></textarea>
                            </div>
                            <div class="form-selector">
                                <button class="btn" onclick="FormValidasi();" id="btn-send-contact">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="contact_form_map" class="col-xs-12 col-sm-6">
                    <h3 class="page-subheading">Information</h3>
                    <p>MAU BELANJA EMAS ? INGAT .. TOKO EMAS HIDUP BANJARAN ☺️
                        "Pusatnya Perhiasan Emas Model Terkini." ❣️ Pusat Belanja Emas Online/ Offline aman dan terpercaya. ☺️💕.</p>
                    <br>
                    <!-- <ul>
                                <li>Praesent nec tincidunt turpis.</li>
                                <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                                <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                            </ul> -->
                    <br>
                    <ul class="store_info">
                        <?php
                        foreach ($DataPerusahaan->data  as $row) : ?>
                            <li><i class="fa fa-home"></i><?= $row->alamat ?></li>
                            <li><i class="fa fa-phone"></i><span><?= $row->no_hp ?></span></li>
                            <li><i class="fa fa-envelope"></i>Email: <span><?= $row->email ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</main><!-- end MAIN -->
<script>
    function FormValidasi() {
        var applicationForm = document.getElementById("FormValidasi");
        if (applicationForm.checkValidity()) {
            applicationForm.submit();
            Swal.fire('Success!', 'Berhasil Dikirim!', 'success');
        } else {
            applicationForm.reportValidity();
        }
    }
</script>