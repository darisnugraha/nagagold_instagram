<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Parameter Point
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <form action="<?= base_url('simpan-parameter-point') ?>" method="POST">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12">
                    <label>Parameter Point / Gram</label>
                </div>
                <?php if(count($ParameterPoint->data) == 0): ?>
                    <div class="col-span-4">
                        <div class="relative mt-2">
                            <input type="text" onkeypress="return NumberNoEnter(event)" autocomplete="off" id="rupiah" value="<?= $data->poin ?>" name="point" class="input pr-12 w-full border col-span-4" placeholder="Point">
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="relative mt-2">
                            <select class="select2 w-full" name="status">
                                <option value="RP" > RP </option>
                                <option value="GR" > GR </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="relative mt-2">
                            <input type="submit" value="Simpan Perubahan" class="button bg-theme-1 text-white input w-full border">
                        </div>
                    </div>
                <?php else: ?>
                <?php foreach ($ParameterPoint->data  as $data) : ?>
                    <div class="col-span-4">
                        <div class="relative mt-2">
                            <input type="text" onkeypress="return NumberNoEnter(event)" autocomplete="off" id="rupiah" value="<?= $data->poin ?>" name="point" class="input pr-12 w-full border col-span-4" placeholder="Point">
                            <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600"><?= $data->status ?></div>
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="relative mt-2">
                            <select class="select2 w-full" name="status">
                                <?php if ($data->status == "RP") : ?>
                                    <option value="RP" selected> RP </option>
                                    <option value="GR"> GR </option>
                                <?php else : ?>
                                    <option value="RP"> RP </option>
                                    <option value="GR" selected> GR </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-span-4">
                        <div class="relative mt-2">
                            <input type="submit" value="Simpan Perubahan" class="button bg-theme-1 text-white input w-full border">
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>


            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        var rupiah1 = $('#rupiah').val();
        console.log(rupiah1);
        $('#rupiah').val(formatRupiah(rupiah1));
        // console.log();
    })
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, '');
    });
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
</script>