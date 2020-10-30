<!-- Modal -->
<?php 
	// $token                          = $this->session->userdata('token');
    $Provinsi		        = $this->SERVER_API->_getAPI('raja-ongkir/provinsi/','');
?>
<div class="modal fade" id="tambahalamat" tabindex="-1" role="dialog" aria-labelledby="tambahalamatLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="overlay" style="display:none">
                <span class="fa fa-spinner fa-6 fa-spin"></span>Loading....
            </div>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahalamatLabel">Tambah Alamat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('wp-simpan-alamat') ?>" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label>Provinsi</label>
                                <!-- <input type="text" name="no_pesanan" placeholder="Masukan Provinsi..." required class="form-control provinsi"> -->
                                <select autocomplete="off" required name="provinsi" id="provinsi" class="form-control">
                                <option value="">Pilih Provinsi</option>
                                            <?php  $count = count($Provinsi->data);
                                            $dataprovinsi = $Provinsi->data;
                                            for($i=0; $i<$count; $i++ ): ?>
                                                <option <?=  explode('-',$this->session->userdata('provinsi_lama'))[0]  == $dataprovinsi[$i]->province_id ? 'selected' : '' ?> value="<?= $dataprovinsi[$i]->province_id ?>-<?= $dataprovinsi[$i]->province?>"> <?= $dataprovinsi[$i]->province?> </option>
                                            <?php endfor; ?>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Kota</label>
                                <select required autocomplete="off" required name="kota" id="kota" class=" form-control">
                                    <option value="">Pilih Kota</option>
                                </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                <label>Kecamatan</label>
                                <select required autocomplete="off" name="kecamatan" id="kecamatan" class=" form-control">
                                    <option value="">Pilih kecamatan</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label>Kode Pos</label>
                                <input autocomplete="off" type="number" name="kode_pos" placeholder="Masukan Kode Pos" required
                                    class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                                <label>Alamat</label>
                                <textarea autocomplete="off" required class="form-control" name="alamat" placeholder="Masukan Alamat"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  onclick="$('.overlay').show();"  style="color: #FFFFFF;" class="btn btn-primary">Simpan Alamat</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#provinsi').on('change', function() {
			var id = $(this).val();
            console.log(id);
            var provinsi = id.split("-");
        // console.log(provinsi);
            $.ajax({
                url: base_url+ "loadkota",
                method: "POST",
                data: {
                    province_id : provinsi[0]
                },
                complete: function(respons) {
                    var feedback = respons.responseJSON;
                    // console.log(feedback.data);
                    $('#kota').html("<option value=''>Pilih Kota</option>");
                    $.each(feedback.data, function(index, element) {
                        $('#kota').append(`
                            <option value="` + element.city_id +`-`+ element.type +' '+ element.city_name +`">` + element.type + ` ` + element.city_name + `</option>
                        `);
                    })
                }
            });
        })
        $('#kota').on('change', function() {
        var id = $(this).val();
        // console.log(id);
        var kota = id.split("-");
        // console.log(kota[0]);
        // var kecamatan = id.split("-");
        $.ajax({
            url: base_url+"loadkecamatan",
            dataType: 'json',
            method: 'POST',
            data: {
                subdistrict_id: kota[0]
            },
            complete: function(respons) {
                var feedback = respons.responseJSON;
                $('#kecamatan').html("<option value=''>Pilih Kecamatan</option>");
                $.each(feedback.data, function (index, element) {
                    $('#kecamatan').append(`
                        <option value="` + element.subdistrict_id + '-' + element.subdistrict_name+`">` +element.subdistrict_name + `</option>
                    `);
                })
            }
        })
    })
    
</script>
