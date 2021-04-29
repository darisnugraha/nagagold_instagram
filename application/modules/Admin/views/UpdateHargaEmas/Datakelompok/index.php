<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Data Keompok
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#tambahkeompok" class="button inline-block bg-theme-1 text-white">Tambah Kelompok</a>
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Kode Kelompok</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Nama Kelompok</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
           
            </tbody>
        </table>
    </div>
    <?= $this->load->view('Admin/UpdateHargaEmas/Datakelompok/tambahKelompok'); ?>

</div>
