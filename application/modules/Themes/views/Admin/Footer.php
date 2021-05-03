</div>
</div>

<script src="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/admin/js/simple.money.format.js') ?>"></script>
<?php
if ($this->session->flashdata('alert')) {
    echo $this->session->flashdata('alert');
}
?>
<script>
    
    $('.rupiah').simpleMoneyFormat();
    function hapusconfirm(url) {
        Swal.fire({
            title: 'Konfirmasi Hapus Data!',
            text: "Yakin Untuk Menghapus Data Ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                window.location.href = url;
            }
        })
    }
    $(document).ready(function() {
        $(".selectoption").select2({
            theme: "bootstrap",
            width: null,
            placeholder: "Masukan Kategori",
        })

        $(".nopesanan").select2({
            theme: "bootstrap",
            width: null,
            placeholder: "Masukan Kata Kunci Pencarian",
            ajax: {
                url: '<?= base_url('cari-nopesanan') ?>',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        function formatState(state) {
            if (!state.id) {
                return state.text;
            }
            var baseUrl = "<?= base_url('assets/icon/') ?>";
            var $state = $('<span><img src="' + baseUrl + state.element.value.toLowerCase() + '.png" /> ' + state.text + '</span>');
            return $state;
        };
        $(".js-example-templating").select2({
            templateResult: formatState
        });
    });
</script>
<script src="<?= base_url('assets/admin/') ?>js/app.js"></script>
<!-- END: JS Assets-->
</body>

</html>