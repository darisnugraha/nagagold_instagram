<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Form Edit Barang
            </h2>
        </div>
        <?php foreach ($DetailBarang->data  as $row) : ?>
            <form role="form" action="<?= base_url('simpan-edit-barang') ?>" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="status" value="<?= $status ?>">
                <div class="p-5" id="input">
                    <div class="mt-3">
                        <div>
                            <label>Kode Barcode</label>
                            <input type="hidden" name="ongkos" value="<?= encrypt_url($row->ongkos) ?>">
                            <input type="hidden" name="harga_atribut" value="<?= encrypt_url($row->harga_atribut) ?>">
                            <input type="hidden" name="kadar_cetak" value="<?= encrypt_url($row->kadar_cetak) ?>">
                            <input type="hidden" name="nama_atribut" value="<?= encrypt_url($row->nama_atribut) ?>">
                            <input type="hidden" name="nama_barang" value="<?= encrypt_url($row->nama_barang) ?>">
                            <input type="hidden" name="kode_intern" value="<?= encrypt_url($row->kode_intern) ?>">
                            <input type="hidden" name="kode_barang" value="<?= encrypt_url($row->kode_barang) ?>">
                            <input type="hidden" name="kode_barcode" value="<?= encrypt_url($row->kode_barcode) ?>">
                            <input type="text" disabled value="<?= $row->kode_barcode ?>" class="input w-full border mt-2" placeholder="Kode Barang">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div>
                            <label>Nama Barang</label>
                            <input type="text" disabled value="<?= $row->nama_barang ?>" class="input w-full border mt-2" placeholder="Kode Barang">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div>
                            <label>Kode Group</label>
                            <select class="input w-full border mt-2 select2 kategori" name="kode_kategori" required style="width: 100%">
                                <option value="">Pilih Kode Group</option>
                                <?php foreach ($DataKategori->data  as $kd) : ?>
                                    <option <?= $row->kode_kategori == $kd->kode_kategori ? 'selected' : ''; ?> value="<?= $kd->kode_kategori ?>"> <?= $kd->nama_kategori ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div>
                            <label>Kode Dept</label>
                            <select class="input w-full border mt-2 select2 sub_jenis" name="kode_jenis" required style="width: 100%">
                                <option value="">Pilih Kode Dept</option>
                                <?php foreach ($DataJenis->data  as $jns) : ?>
                                    <option <?= $row->kode_jenis == $jns->kode_jenis ? 'selected' : ''; ?> value="<?= $jns->kode_jenis ?>"> <?= $jns->nama_jenis ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                                <div>
                                    <label>Kode Kelompok</label>
                                    <select class="input w-full border mt-2 select2 sub_jenis" name="kode_kelompok" required style="width: 100%">
                                            <option value="">Pilih Kode Kelompok</option>
                                        <?php foreach($DataKelompok->data as $kmp ): ?>
                                            <option <?= $row->kode_kelompok == $kmp->kode_kelompok ? 'selected' : ''; ?> value="<?= $kmp->kode_kelompok ?>"> <?= $kmp->nama_kelompok ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                        <h2 class="text-lg font-medium mr-auto">

                        </h2>
                        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                            <div class="text-center">
                                <a href="javascript:;" class="addgambar button inline-block bg-theme-1 text-white">Tambah Gambar</a>
                            </div>
                        </div>
                    </div>
                   
                    <div class="grid grid-cols-12 gap-12 mt-5 gambarbaru">
                        <?php
                        $jml = count($row->gambar);
                        $data_gambar = $row->gambar;
                        // $no=1;
                        for ($i = 0; $i < $jml; $i++) :
                        ?>
                            <input value="<?= $data_gambar[$i]->lokasi_gambar ?>" name="lokasi_gambar[]" type="hidden" />
                            <div class="intro-y col-span-3 lg:col-span-3 imageshow<?= $data_gambar[$i]->kode_gambar ?>">
                                <div class="mt-3">
                                    <div>
                                        <div class="image-upload">
                                            <label for="file-input1" class="pointer">
                                                <img id="<?= $data_gambar[$i]->kode_gambar ?>" width="200" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $data_gambar[$i]->lokasi_gambar ?>" alt="image preview" />
                                            </label>
                                            <input value="<?= $data_gambar[$i]->lokasi_gambar ?>" name="nama_file[]" type="hidden" />
                                            <div class="relative mt-2">
                                                <input id="file-input1" class="input pr-16 w-full border col-span-4" name="photo<?= $i ?>" onchange="document.getElementById('<?= $data_gambar[$i]->kode_gambar ?>').src = window.URL.createObjectURL(this.files[0])" type="file" />
                                                <div class="absolute top-0 right-0 rounded-r w-16 h-full flex items-center justify-center bg-gray-100 border text-gray-600">File</div>
                                            </div>
                                            <button type="button" onclick="hapusgambar('<?= $data_gambar[$i]->kode_gambar ?>');" class="button bg-theme-1 input w-full btn-block text-white">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" value="<?= $jml - 1 ?>" class="jml_gambar" name="jml_gambar">
                    <div class="mt-6">
                        <button type="submit" class="button bg-theme-1 input w-full btn-block text-white">Simpan</button>
                    </div>

            </form>
    </div>
</div>
<?php endforeach; ?>
</div>

</div>
<script>
    function hapusgambar(id) {
        var nama = '.imageshow' + id;
        $('.imageshow' + id + '').remove();
    }
    $(document).ready(function() {
        var count = '<?= $jml ?>';
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
                            <input id="file-input3" class="input pr-16 w-full border col-span-4" name="photo` + count + `" onchange="document.getElementById('output` + count + `').src = window.URL.createObjectURL(this.files[0])" type="file" />
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



        $('.kategori').on('change', function() {
            var id = $(this).val();
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
                    console.log(feedback);
                    if (feedback.status == "berhasil") {
                        $.each(feedback.data, function(index, element) {
                            $('.sub_jenis').html('');
                            $('.sub_jenis').append(`
                                <option value="` + element.kode_jenis + `"> ` + element.nama_jenis + ` </option>
                        `);
                        })
                    } else {
                        $('.sub_jenis').html('');
                        $('.sub_jenis').append(`
                        <option value=""> Pilih Kode Jenis </option>
                    `);
                    }
                }
            })
        })
    })
</script>