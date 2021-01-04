<!-- All JavaScript Files-->
<script src="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.min.js"></script>
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
<script src="assets/module/register/app.js"></script>
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
    </script>
<?php if ($this->session->flashdata('alert')) {
    echo $this->session->flashdata('alert');
} ?>

</html>