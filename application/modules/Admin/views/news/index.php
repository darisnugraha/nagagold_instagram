<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            News
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
                <a href="<?= base_url('add-news') ?>" data-toggle="modal" data-target="#header-footer-modal-preview"
                    class="button inline-block bg-theme-1 text-white">Add News</a>
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <!-- <th class="border-b-2">No</th> -->
                    <th class="border-b-2">Judul</th>
                    <!-- <th class="border-b-2 text-center whitespace-no-wrap">Gambar</th> -->
                    <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;  foreach($news->data  as $row ): ?>
                <tr>
                    <!-- <td width="10px">  <?= $no++ ?> </td> -->
                    <td class="border-b-2"> <?= $row->judul ?> </td>
                    <!-- <td class="border-b-2 text-center whitespace-no-wrap">
                        <div class="flex sm:justify-center text-center items-center">
                            <img width="100px" height="50px" src="<?= $row->lokasi_gambar ?>">
                        </div>
                    </td> -->
                    <td class="border-b-2 text-center">
                        <div class="flex sm:justify-center text-center items-center">
                            <a class="flex items-center mr-3 pointer" href="<?= base_url('edit-news/' . $row->_id); ?>">
                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center mr-3 pointer"
                                onclick="hapusconfirm('<?= base_url('hapus-news/' . $row->_id); ?>')"> <i
                                    data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>