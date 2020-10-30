<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Kelola Slider
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#tambah_slider" class="button inline-block bg-theme-1 text-white">Tambah Slider</a>
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Foto</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                // var_dump($Slider);
                foreach ($Slider->data  as $row) :  ?>
                    <tr>
                        <td class="border-b-2 whitespace-no-wrap"><?= $no++ ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><img src="<?= base_url('assets/images/NsiPic/sliderpromo/' . $row->lokasi_gambar) ?>"></td>
                        <td class="border-b-2 text-center whitespace-no-wrap">
                            <a class="flex items-center mr-3 pointer" onclick="hapusconfirm('<?= base_url('hapus-slider/' . $row->_id); ?>')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->load->view('Admin/Pengaturan/KelolaSlider/tambah_slider'); ?>
</div>