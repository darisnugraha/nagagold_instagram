<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Kelola Data Toko
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#tambahdatatoko" class="button inline-block bg-theme-1 text-white">Tambah Data Toko</a>
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Nama Toko</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Alamat Lengkao</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($DataToko->data as $row) : ?>
                    <tr>
                        <td class="border-b-2 whitespace-no-wrap"><?= $no++ ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= $row->nama_toko ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= $row->alamat_lengkap ?> <?= $row->nama_kota ?> <?= $row->nama_kecamatan ?> <?= $row->kode_pos ?> <?= $row->nama_provinsi ?> </td>
                        <td class="border-b-2 text-center whitespace-no-wrap">
                            <div class="flex sm:justify-center items-center">
                                <!-- <a class="flex items-center mr-3 pointer" onClick="ShowModal(this)" data-kodeprovinsi="<?= $row->kode_provinsi ?>" data-kodepos="<?= $row->kode_pos ?>" data-alamatedit="<?= $row->alamat_lengkap ?>" data-kode_toko="<?= $row->kode_toko ?>" data-nama_toko="<?= $row->nama_toko ?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a> -->
                                <a class="flex items-center mr-3 pointer" onclick="hapusconfirm('<?= base_url('hapus-data-kota/' . $row->kode_toko); ?>')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->load->view('Admin/Pengaturan/DataToko/tambah_datatoko'); ?>
    <!-- <?= $this->load->view('Admin/Pengaturan/DataToko/edit_datatoko'); ?> -->
</div>

<script>
    function ShowModal(elem) {
        // alert(dataId);
        // $('#exampleModal').show();
        $('.kode_toko').val($(elem).data("kode_toko"));
        $('.nama_toko_edit').val($(elem).data("nama_toko"));
        $('.kode_posedit').val($(elem).data("kodepos"));
        $('.alamat_edit').val($(elem).data("alamatedit"));
        $('#edit_data_toko').modal('show');
    }
</script>