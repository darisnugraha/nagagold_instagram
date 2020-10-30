
<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->
    
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Transaksi Pembelian
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <div class="text-center"> 
                    <!-- <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button inline-block bg-theme-1 text-white">Tambah Jenis</a>  -->
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">No Transaksi</th>
                    <th class="border-b-2 text-left whitespace-no-wrap">Nama Pembeli</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Nama Barang</th> -->
                    <th class="border-b-2 text-center whitespace-no-wrap">Jumlah</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($DataBarang->data as $row ): ?>
                    <tr>
                        <td class="border-b-2 whitespace-no-wrap"><?= $no++ ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= $row->kode_barcode ?></td>
                        <td class="border-b-2 text-left whitespace-no-wrap"><?= $row->nama_barang ?></td>
                        <!-- <td><?= $row->kode_group ?></td>
                        <td><?= $row->kode_dept ?></td> -->
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= number_format($row->harga_jual) ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center mr-3 pointer" href="<?= base_url('edit-barang/'.encrypt_url($row->kode_barcode).'') ?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <!-- <a class="flex items-center mr-3 pointer" onclick="hapusconfirm('<?= base_url('hapus-jenis/'.$row->kode_jenis);?>')" > <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a> -->
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
      
</div>

