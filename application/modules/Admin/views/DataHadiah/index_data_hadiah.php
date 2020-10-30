<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            List Data hadiah
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#tambahhadiah" class="button inline-block bg-theme-1 text-white">Tambah Hadiah</a>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#tambahstockhadiah" class="button inline-block bg-theme-1 text-white">Tambah Stock Hadiah</a>
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#ambilstockhadiah" class="button inline-block bg-theme-1 text-white">Ambil Stock Hadiah</a>
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Kode Hadiah</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Nama Hadiah</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Point</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Stock</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($DataHadiah->data as $row) : ?>
                    <tr>
                        <td class="border-b-2 whitespace-no-wrap"><?= $no++ ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= $row->kode_hadiah ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= $row->nama_hadiah ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= $row->poin ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= $row->qty ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center mr-3 pointer" data-toggle="modal" data-target="#editdatahadiah<?= $row->kode_hadiah  ?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center mr-3 pointer" onclick="hapusconfirm('<?= base_url('hapus-hadiah/' . $row->kode_hadiah); ?>')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->load->view('Admin/DataHadiah/edithadiah'); ?>
    <?= $this->load->view('Admin/DataHadiah/tambahhadiah'); ?>
    <?= $this->load->view('Admin/DataHadiah/tambahstockhadiah'); ?>
    <?= $this->load->view('Admin/DataHadiah/ambilstockhadiah'); ?>
</div>