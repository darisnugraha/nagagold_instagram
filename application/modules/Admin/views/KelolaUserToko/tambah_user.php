<div class="p-5" id="header-footer-modal">
    <div class="preview">
        <div class="modal" id="tambah-user">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Tambah User Toko
                    </h2>
                </div>
                <form action="<?= base_url('simpan-user-toko') ?>" class="validate-form" method="POST">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12">
                            <label>User Id</label>
                            <input type="text" name="user_id_toko" required onkeypress="return event.keyCode != 13;" class="input w-full border mt-2 flex-1" placeholder="Masukan User Id">
                        </div>
                        <div class="col-span-12">
                            <label>Nama Lengkap</label>
                            <input type="text" name="user_name_toko" required onkeypress="return event.keyCode != 13;" class="input w-full border mt-2 flex-1" placeholder="Masukan Nama Lengkap">
                        </div>
                        <div class="col-span-12">
                            <label>Password</label>
                            <input type="password" name="password" required onkeypress="return event.keyCode != 13;" class="input w-full border mt-2 flex-1" placeholder="Masukan Password">
                        </div>
                        <div class="col-span-12">
                                <label>Kode Toko </label>
                                <select style="width:100%" required name="kode_toko" class="select2 w-full">
                                    <?php foreach($DataToko->data  as $datatoko ): ?>
                                       <option value="<?= $datatoko->kode_toko ?>" <?= $datatokoa->kode_toko == $row->kode_toko ? 'selected' : '' ?>> <?= $datatoko->kode_toko ?> - <?= $datatoko->nama_toko ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Batal</button>
                        <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#pass2').on('input keyup', function() {
            var pass1 = $('#pass1').val();
            var pass2 = $('#pass2').val();
            var input2 = document.getElementById('pass2');
            var input1 = document.getElementById('pass1');

            if (pass1 != pass2) {
                $('#password_salah1').show();
                $('#password_salah').show();
                input1.className = "input w-full border mt-2 error";
                input2.className = "input w-full border mt-2 error";
            } else {
                $('#password_salah1').hide();
                $('#password_salah').hide();
                input1.className = "input w-full border border-theme-9 mt-2";
                input2.className = "input w-full border border-theme-9 mt-2";
            }
        });


    });
</script>