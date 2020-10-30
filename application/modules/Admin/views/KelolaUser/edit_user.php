<?php
$no = 1;
foreach ($DataUser->data as $row) : 
    
    ?>
    <div class="p-5" id="header-footer-modal">
        <div class="preview">
            <div class="modal" id="edituser<?= $row->user_id ?>">
                <div class="modal__content">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Edit User
                        </h2>
                    </div>
                    <form action="<?= base_url('edit-user') ?>" method="POST">
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <!-- <div class="col-span-12"> -->
                            <!-- <label>User Id</label> -->
                            <input type="hidden" value="<?= $row->user_id ?>" name="user_id" class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Jenis">
                            <!-- <input type="text"  value="<?= $row->user_id ?>" disabled class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Jenis"> -->
                            <!-- </div> -->
                            <div class="col-span-12">
                                <label>Nama Lengkap</label>
                                <input type="text" required onkeypress="return event.keyCode != 13;" value="<?= $row->nama_lkp ?>" name="nama_lkp" class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Jenis">
                            </div>
                            <div class="col-span-12">
                                <label>Type User </label>
                                <select style="width:100%" required name="type" class="select2 w-full">
                                    <?php if ($row->type == "ADMIN") : ?>
                                        <option selected value="ADMIN"> ADMIN </option>
                                        <option value="OWN"> OWNER </option>
                                    <?php else : ?>
                                        <option value="ADMIN"> ADMIN </option>
                                        <option selected value="OWN"> OWNER </option>
                                    <?php endif; ?>
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
<?php endforeach; ?>