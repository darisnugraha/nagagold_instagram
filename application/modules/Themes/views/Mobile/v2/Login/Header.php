<!DOCTYPE html>
<html lang="en">
<?php $data    = $this->SERVER_API->_getAPI('system-perusahaan'); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $nama_form ?> - <?= strtoupper($data->data[0]->nama_perusahaan) ?> </title>
    <link rel="icon" href="<?= base_url('assets/logo/fanction.ico') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url('assets/mobile/v2/css/') ?>style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.css') ?>">
    <script>
    var base_url = '<?= base_url() ?>';
    </script>
</head>
<div id="preloader">
    <img src="<?= base_url('assets/images/loadingmobile.gif') ?>" alt="Tunggu Sebentar..." />
</div>
<div id="preloader" class="loaderform" style="display:none">
    <img src="<?= base_url('assets/images/loadingmobile.gif') ?>" alt="Tunggu Sebentar..." />
</div>

<body>