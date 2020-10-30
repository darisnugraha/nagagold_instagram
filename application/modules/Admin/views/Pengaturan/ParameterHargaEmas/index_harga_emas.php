<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Parameter Harga Emas
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <form action="<?= base_url('simpan-parameter-emas') ?>" method="POST">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12">
                    <label>Masukan Harga Emas Sekarang</label>
                </div>
                <div class="col-span-4">
                    <div class="relative mt-2">
                        <select class="input border mr-2 w-full" name="kode_group" id="kode_group">
                            <option value="">Pilih Kode Group</option>
                            <?php foreach($GrouupEmas->data  as $row ): ?>
                                <option value="<?= $row->kode_group ?>"> <?= $row->kode_group ?>  </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="relative mt-2">
                        <input type="text" id="nama_barang" disabled name="nama_barang" readonly onkeypress="return NumberNoEnter(event)" class="input w-full border " placeholder="Nama Kode Group">
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="relative mt-2">
                        <input type="text" id="rupiah" name="harga_emas" onkeypress="return NumberNoEnter(event)" class="input w-full border " placeholder="Masukan Parameter Harga Emas Sekarang">
                    </div>
                </div>
                
                <div class="col-span-12">
                    <div class="relative mt-2">
                        <input type="submit" value="Simpan Perubahan" class="button bg-theme-1 text-white input w-full border">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
  $('#kode_group').on("change", function(){
      var id = $(this).val();
    //   console.log(id);
    $.ajax({
            url: base_url + "loadparamterhargaemas",
            dataType: 'json',
            type: 'POST',
            data: {
                loadbarang: 'loaddatabarang'
            },
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=utf-8')
                }
            },
            error: function(e) {
                console.log(e);
            },
            complete: function(respons) {
                var feedback = respons.responseJSON;
                // console.log(feedback);
                if (feedback.status == "berhasil") {
                    $.each(feedback.data, function(index, element) {
                        // console.log(element);
                        if(id==element.kode_group){
                            $('#nama_barang').val(element.nama_group);
                            $('#rupiah').val(element.harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
                        }
                    })
                } else {
                  

                }
            }
        })
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