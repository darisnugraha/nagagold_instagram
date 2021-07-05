<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Form Tambah Barang
            </h2>
        </div>
        <form role="form" action="<?= base_url('simpan-tambah-barang') ?>" enctype="multipart/form-data" method="POST">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                <div class="col-span-4 hidden">
                    <div>
                        <label>Kode Barang</label>
                        <input type="text" value="<?php echo $kode_barang ?>" name="kode_barang" class="input w-full border "
                            placeholder="Kode Barang">
                    </div>
                </div>
                <div class="col-span-4 hidden">
                    <div>
                        <label>Kode Barcode</label>
                        <input type="text" value="<?php echo $kode_barang ?>" name="kode_barcode" required class="input w-full border" readonly
                            placeholder="Kode Barcode">
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Nama Barang</label>
                        <input type="text" value="" name="nama_barang"  required class="input w-full border "
                            placeholder="Nama Barang">
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Kategori</label>
                        <select class="input w-full border mt-2 select2 kategori" name="kode_kategori" required
                            style="width: 100%">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($DataKategori->data  as $kd) : ?>
                            <option <?= $row->kode_kategori == $kd->kode_kategori ? 'selected' : ''; ?>
                                value="<?= $kd->kode_kategori ?>"> <?= $kd->nama_kategori ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Kode Jenis</label>
                        <select class="input w-full border mt-2 select2 sub_jenis" name="kode_jenis" required
                            style="width: 100%">
                            <option value="">Pilih Kode jenis</option>
                        </select>
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Kode Kelompok</label>
                        <select class="input w-full border mt-2 select2 id_kelompok" name="kode_kelompok" required
                            style="width: 100%">
                            <option value="">Pilih Kode Kelompok</option>
                            <?php foreach($DataKelompok->data as $kmp ): ?>
                            <option <?= $row->kode_kelompok == $kmp->kode_kelompok ? 'selected' : ''; ?>
                                value="<?= $kmp->kode_kelompok ?>"> <?= $kmp->nama_kelompok ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-span-4">
                    <div>
                        <label>Jenis Kelompok</label>
                        <select class="input w-full border mt-2 select2 id_jenis" name="jenis_kelompok" required
                            style="width: 100%">
                            <option value="">Pilih Kode jenis Kelompok</option>
                        </select>
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Kadar</label>
                        <input name="kadar" required type="text"class="input w-full border"
                            placeholder="Masukan Kadar">
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Kadar Cetak</label>
                        <input name="kadar_cetak" required type="text"class="input w-full border"
                            placeholder="Masukan Kadar Cetak">
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Berat</label>
                        <input name="berat" required type="text"class="input w-full border"
                            placeholder="Masukan Berat">
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Berat Asli</label>
                        <input name="berat_asli" required type="text"class="input w-full border"
                            placeholder="Masukan Berat Asli">
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Nama Atribut</label>
                        <input name="nama_atribut" type="text"class="input w-full border"
                            placeholder="Masukan Nama Atribut">
                    </div>
                </div>
            
                <div class="col-span-4">
                    <div>
                        <label>Harga Atribut</label>
                        <input name="harga_atribut" type="text"class="input w-full border" data-type="currency"
                            placeholder="Masukan Harga Atribut">
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Stock</label>
                        <input name="stock" required type="text"class="input w-full border"
                            placeholder="Masukan Stock">
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Ongkos</label>
                        <input name="ongkos" type="text" class="input w-full border" data-type="currency"
                            placeholder="Masukan Ongkos">
                    </div>
                </div>
                <div class="col-span-4">
                    <div>
                        <label>Kode Intern</label>
                        <input name="kode_intern" type="text"class="input w-full border"
                            placeholder="Masukan Kode Intern">
                    </div>
                </div>
                <div class="col-span-8">
                    <!-- <input type="text" name="currency-field" id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00"> -->
                </div>
                <div class="col-span-4">
                    <div>
                        <label>&nbsp;</label>
                        <div class="text-right">
                            <a href="javascript:;"
                                class="addgambar w-full button inline-block bg-theme-1 text-white">Tambah
                                Gambar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-5 grid row-gap-3">
                <div class="col-span-12">
                    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                        <h2 class="text-lg font-medium mr-auto">

                        </h2>

                    </div>
                </div>

                <div class="grid grid-cols-12 gap-12 mt-5 gambarbaru">
                   
            </div>
            <input type="hidden" value="" class="jml_gambar" name="jml_gambar">
            <div class="col-span-12">
                <button type="submit" class="button bg-theme-1 input w-full btn-block text-white">Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>

</div>
<script>
function hapusgambar(id) {
    var nama = '.imageshow' + id;
    $('.imageshow' + id + '').remove();
}
$(document).ready(function() {
    var count = '1';
    $('.addgambar').on('click', function() {
        $('.gambarbaru').append(`
        <div class="intro-y col-span-3 lg:col-span-3 imageshow` + count + `">
            <div class="mt-3">
                <div>
                    <div class="image-upload">
                    <label for="file-input3" class="pointer">
                        <img id="output` + count + `" width="200"  onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src=""
                            alt="image preview" />
                    </label>
                    <div class="relative mt-2">
                            <input id="file-input3" class="input pr-16 w-full border col-span-4" name="photo` + count +
            `" onchange="document.getElementById('output` + count + `').src = window.URL.createObjectURL(this.files[0])" type="file" />
                            <div class="absolute top-0 right-0 rounded-r w-16 h-full flex items-center justify-center bg-gray-100 border text-gray-600">File</div>
                    </div>
                    <button type="button" onclick="hapusgambar('` + count + `');" class="button bg-theme-1 input w-full btn-block text-white">Hapus</button>
                </div>
                </div>
            </div>
        </div>  
        `);
        count = parseInt(count) + parseInt(1);
        $('.jml_gambar').val(count - 1);
    });



    $('.id_kelompok').on('change', function() {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: base_url + "/cari-jenis-kelompok",
            dataType: 'json',
            type: 'POST',
            data: {
                kode_kelompok: id
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
                if (feedback.status == "berhasil") {
                    if (feedback.data.length === 0) {
                        $('.id_jenis').html('');
                        $('.id_jenis').append(`
                        <option value=""> Pilih Kode Jenis </option>
                    `);
                    } else {
                        // console.log(feedback.data);
                        $('.id_jenis').html('');
                        $.each(feedback.data, function(index, element) {
                            $('.id_jenis').append(`
                                    <option value="` + element.kode_jenis + `"> ` + element.nama_jenis + ` </option>
                            `);
                        })
                    }
                } else {
                    $('.id_jenis').html('');
                    $('.id_jenis').append(`
                        <option value=""> Pilih Kode Jenis </option>
                    `);
                }
            }
        })
    })
    $('.kategori').on('change', function() {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: base_url + "/cari-jenis",
            dataType: 'json',
            type: 'POST',
            data: {
                kode_kategori: id
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
                    if (feedback.data.length === 0) {
                        $('.sub_jenis').html('');
                        $('.sub_jenis').append(`
                        <option value=""> Pilih Kode Jenis </option>
                    `);
                    } else {
                        $('.sub_jenis').html('');
                        $.each(feedback.data, function(index, element) {
                            $('.sub_jenis').append(`
                                <option value="` + element.kode_jenis + `"> ` + element.nama_jenis + ` </option>
                        `);
                        })
                    }
                } else {
                    $('.sub_jenis').html('');
                    $('.sub_jenis').append(`
                        <option value=""> Pilih Kode Jenis </option>
                    `);
                }
            }
        })
    })

    // Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    // var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    // right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    // if (blur === "blur") {
    //   right_side += "00";
    // }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = left_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    // input_val = + input_val;
    
    // final formatting
    // if (blur === "blur") {
    //   input_val += ".00";
    // }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

})
</script>