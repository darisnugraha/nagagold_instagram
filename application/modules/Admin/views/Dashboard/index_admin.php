
<div class="content">
<?= $this->load->view('Themes/Admin/tollbar') ?>
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    General Report
                                </h2>
                                <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i> 
                                                <!-- <div class="ml-auto">
                                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                                </div> -->
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"><?= $BarangTerjual->data[0]->penjualan == 0 ?  'Belum Ada Penjualan' : number_format($BarangTerjual->data[0]->penjualan )?></div>
                                            <div class="text-base text-gray-600 mt-1"><?= $BarangTerjual->data[0]->penjualan == 0 ?  'Hari Ini' : "Barang Terjual Hari Ini" ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="shopping-cart" class="report-box__icon text-theme-11"></i> 
                                                <!-- <div class="ml-auto">
                                                    <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-feather="chevron-down" class="w-4 h-4"></i> </div>
                                                </div> -->
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"><?= $OrderanBaru->data[0]->penjualan==0 ? "Belum Ada Orderan" : $OrderanBaru->data[0]->penjualan ?></div>
                                            <div class="text-base text-gray-600 mt-1"><?= $OrderanBaru->data[0]->penjualan==0 ? "Hari Ini" : "Orderan Baru" ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="monitor" class="report-box__icon text-theme-12"></i> 
                                                <!-- <div class="ml-auto">
                                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                                </div> -->
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"><?= number_format($TotalBarangOnline->data[0]->barang_online) ?></div>
                                            <div class="text-base text-gray-600 mt-1">Total Barang Online</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="user" class="report-box__icon text-theme-9"></i> 
                                                <!-- <div class="ml-auto">
                                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                                </div> -->
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"><?= $DataPengunjung->data[0]->pengunjung ==0 ? 'Belum Ada Pengunjung' : number_format($DataPengunjung->data[0]->pengunjung) ?></div>
                                            <div class="text-base text-gray-600 mt-1"><?= $DataPengunjung->data[0]->pengunjung ==0 ? 'Hari Ini' : "Pengunjung Hari Ini"?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->
                        <!-- BEGIN: Sales Report -->
                        <!-- <div class="col-span-12 lg:col-span-6 mt-8">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Data Penjualan
                                </h2> -->
                                <!-- <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700">
                                    <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i> 
                                    <input type="text" data-daterange="true" class="datepicker input w-full sm:w-56 box pl-10">
                                </div> -->
                            <!-- </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
                                <canvas id="line-chart" width="500" height="350"></canvas>
                            </div>
                        </div> -->
                        <!-- END: Sales Report -->
                        <!-- BEGIN: Weekly Top Seller -->
                        <!-- <div class="col-span-12 sm:col-span-6 lg:col-span-6 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Kirim No Resi
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-5">
                                <div class="mt-3">
                                    <label>Pilih Transaksi</label>
                                    <select  name="no_trx" style="width:100%" class="form-control nopesanan"></select>
                                </div>
                                <div class="mt-3">
                                    <label>Masukan No Resi</label>
                                    <input type="text" class="input w-full border mt-2" placeholder="Masukan No Resi">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" class="button w-24 bg-theme-1 text-white">Kirim</button>
                                </div>
                            </div>
                        </div> -->
                        <!-- END: Weekly Top Seller -->
                    </div>
                </div>
</div>
            
<script type="text/javascript">
$(document).ready(function() {
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
          labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'],
            datasets: [{
                data: [1,2,3,4,5,2,2,6,32,23,23,2],
                label: "Barang Terjual",
                borderColor: "#17A2B8",
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: 'TRANSAKSI PENJUALAN / BULAN'
            }
        }
    });
 
});
</script>