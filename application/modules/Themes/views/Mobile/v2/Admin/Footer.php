    <!-- Footer Nav-->
    <style>
      .item {

        /* padding-right:8px; */
        padding-top: 2px;
        position: relative;
        /* position:relative;
        padding-top:20px;
        display:inline-block; */
      }

      .notify-badge {
        position: absolute;
        right: 10px;
        top: -3px;
        background: red;
        text-align: center;
        border-radius: 50px 50px 50px 50px;
        color: white;
        padding: 5px 5px;
        font-size: 10px;
      }
    </style>
    <?php $data  = $this->SERVER_API->_getAPI('cart/count', $this->session->userdata('token'));
    //  die;
    ?>
    <div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between">
            <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN_ADMIN") : ?>
              <li class="<?= $this->session->userdata('title') == "Home" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url('wp-dashboard') ?>"><i class="lni lni-home"></i>Home</a></li>
              <li class="<?= $this->session->userdata('title') == "Shop" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url('wp-penjualan-admin') ?>"><i class="lni lni-shopping-basket"></i>Penjualan</a></li>
              <li class="<?= $this->session->userdata('title') == "Profile" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url('wp-profile-admin') ?>"><i class="lni lni-grid-alt"></i>Profile</a></li>
            <?php else : ?>

            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->

    <script src="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.min.js') ?>"></script>
    <?php if ($this->session->flashdata('alert')) {
      echo $this->session->flashdata('alert');
    } ?>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>popper.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>bootstrap.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>waypoints.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.animatedheadline.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.counterup.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>wow.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jarallax.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jarallax-video.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>default/jquery.passwordstrength.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>default/dark-mode-switch.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>default/active.js"></script>
    <script src="<?php echo base_url('assets/theme/js/select2/js/select2.js') ?>"></script>
    <script src="<?php echo base_url('assets/module/jquery.autocomplete.min.js') ?>"></script>
    <script type="text/javascript">
    function run_waitMe(el, num, effect) {
    text = 'Please wait...';
    fontSize = '';
    switch (num) {
        case 1:
            maxSize = '';
            textPos = 'vertical';
            break;
        case 2:
            text = '';
            maxSize = 30;
            textPos = 'vertical';
            break;
        case 3:
            maxSize = 30;
            textPos = 'horizontal';
            fontSize = '18px';
            break;
    }
    el.waitMe({
        effect: effect,
        text: text,
        bg: 'rgba(255,255,255,0.7)',
        color: '#000',
        maxSize: maxSize,
        waitTime: -1,
        source: 'img.svg',
        textPos: textPos,
        fontSize: fontSize,
        onClose: function(el) {}
    });
}

    function funclogin(){
      $('.loaderform').show();
      window.location = base_url+'login';
    }
      $(document).ready(function() {

        // Data yang ditamilkan pada autocomplete.
        var buah = [{
            value: 'Kalung',
            data: 'Kalung'
          },
          {
            value: 'Liontin',
            data: 'Liontin'
          },
          {
            value: 'Cincin',
            data: 'Cincin'
          },
          {
            value: 'Gelang',
            data: 'Gelang'
          },

        ];

        // Selector input yang akan menampilkan autocomplete.
        $("#buah").autocomplete({
          lookup: buah
        });
      })
    </script>

    <script>
      $(".select2").select2({
        placeholder: "Masukan Kata Kunci Pencarian",
        theme: "bootstrap",
      });
      window.setTimeout(function() {
        $(".add2cart-notification").fadeTo(2500, 0).slideUp(2500, function() {
          $(this).remove();
        });
        $(".error-notification").fadeTo(2500, 0).slideUp(2500, function() {
          $(this).remove();
        });
        $(".info-notification").fadeTo(2500, 0).slideUp(2500, function() {
          $(this).remove();
        });
      }, 3000);
    </script>

    </html>