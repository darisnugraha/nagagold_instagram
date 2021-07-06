    <!-- Footer Nav-->
  
    <?php 
      $data  = $this->SERVER_API->_getAPI('cart/count', $this->session->userdata('token'));
      $chatdata = $this->SERVER_API->_getAPI('chat/getCustomer', $this->session->userdata('token'));
      $chatcount = $chatdata->data[0]->count_message_open
    ?>
    <?php
    $count_mess = array_filter($chatdata->data[0]->detail, function ($var)
    {
        return $var->input_by === "ADMIN TOKO" && $var->status === "OPEN";
    });
    ?>
    <div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between">
            <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
              <li class="<?= $this->session->userdata('title') == "Home" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url() ?>"><i class="lni lni-home"></i>Home</a></li>
              <li class="<?= $this->session->userdata('title') == "Shop" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url('shop') ?>"><i class="lni lni-shopping-basket"></i>Shop</a></li>
              <li class="<?= $this->session->userdata('title') == "LiveChat" ? 'active' : '' ?>"><a onClick='updateChat()'">
              <!-- <a onclick="$('.loaderform').show();" href="<?= base_url('chat') ?>"> -->
              <?php if (count($count_mess) > 0) : ?>
                <div class="item"><span class="notify-badge"><?=$chatcount?></span></div>
                <?php else: ?>
                  <div></div>
              <?php endif; ?>
              <i class="lni lni-wechat"></i>Chat
              <!-- </a> -->
              </a></li>
              <!-- <li class="<?= $this->session->userdata('title') == "Cart" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url('cart') ?>">
                  <?php if ($data->data != null) : ?>
                    <div class="item"><span class="notify-badge"><?= $data->data[0]->count_item ?></span></div>
                  <?php endif; ?>
                  <i class="lni lni-cart"></i>Cart</a></li> -->
              <li class="<?= $this->session->userdata('title') == "Profile" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url('wp-dashboard-user') ?>"><i class="lni lni-user"></i>Profil</a></li>
            <?php else : ?>
              <li class="<?= $this->session->userdata('title') == "Home" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url() ?>"><i class="lni lni-home"></i>Home</a></li>
              <li class="<?= $this->session->userdata('title') == "Shop" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url('shop') ?>"><i class="lni lni-shopping-basket"></i>Shop</a></li>
              <li><a onclick="$('.loaderform').show();" href="<?= base_url('login') ?>"><i class="lni lni-user"></i>Masuk</a></li>

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
    <script src="<?php echo base_url('assets/module/function.js') ?>"></script>
    <script src="<?php echo base_url('assets/module/jquery.autocomplete.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/module/rolldate.js') ?>"></script>
    <script type="text/javascript">
    window.onload = function() {
      new Rolldate({
        el: '#date-group1-2',
        format: 'YYYY/MM/DD',
        beginYear: 1900,
        endYear: 2100
      })
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
    <script>
      let baseurl = '<?php echo base_url()?>';
      function updateChat() {
        $('.loaderform').show();
        $.ajax({
        url: baseurl + 'confirm/chat',
        method: "PUT",
        cache: false,
        beforeSend: function(e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=utf-8')
            }
        },
        error: function(e) {
            console.log(e);
            let respone = JSON.parse(e.responseText);
            Swal.fire({
                    title: 'Opps!!!',
                    text: respone.pesan,
                    type: 'warning',
                    reverseButtons: true
                })
        },
        success: function(respons) {
          window.location.href = base_url+'chat';
          console.log(respons);
        },
        });
      }
    </script>
    </html>