<?php
class MYPDF extends TCPDF
{

	// Page footer
	
}
$pdf = new MYPDF('P', 'mm', 'A4 Potrait', true, 'UTF-8', false);
$pdf->setHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
$pdf->AddPage('P', 'A4');
$pdf->SetTitle('Print Invoice');
$PDF_MARGIN_BOTTOM = 20;
$pdf->SetAutoPageBreak(true, $PDF_MARGIN_BOTTOM);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
date_default_timezone_set('Asia/Jakarta');
$date = date('d, F-Y H:i:s');
$html = '<style>'.file_get_contents(_BASE_PATH.'css/app.css?=1.0').'</style>';
$html .= '<div>
<!-- BEGIN: Top Bar -->';
foreach ($DetailTransaksi->data as $row) {
        $html .= '	
			<font size="10" face="Roboto">
            <br>
			<table border="0">
				<tr>
                    <td width="32.5%" > <img src="'.base_url('assets/logo/LogoHeader.png').'" width="150px"> </td>
                    <td align="center" width="36.5%"><b><font size="15px">INVOICE</font></b> <br><br><span color="#1C3FAA">#'.$row->id_trx.'</span></td>
                    <!-- <td width="30%" align="right">Id Transaksi<br>#'.$row->id_trx.'</td> -->
					<td width="32.5%" width="30%">
                    <span><span color="#1C3FAA">'.$row->nama_customer.'</span><br>
                    '.$row->email.'<br>&nbsp;&nbsp;'.$row->no_hp.'<br>';
                    if ($row->type_trx=="AMBIL") {
                        foreach ($row->alamat  as $alamat) {
                            if ($alamat->status_default==1) {
                                $html .= '<span style="font-size: 10pt;">'.'&nbsp;'.'&nbsp;'.$alamat->alamat_lengkap.', '.$alamat->nama_kecamatan.'<br>'.'&nbsp;'.'&nbsp;'.$alamat->nama_kota.','.$alamat->nama_provinsi.'</span>';
                            }
                        }
                    }else{
                        foreach ($row->alamat_penerima  as $alamat) {
                            $html .= '<span style="font-size: 10pt;">'.'&nbsp;'.'&nbsp;'.$alamat->alamat_lengkap.', '.$alamat->nama_kecamatan.'<br>'.'&nbsp;'.'&nbsp;'.$alamat->nama_kota.', '.$alamat->nama_provinsi.'</span>';
                        }
                    }

                $html .= '</span>
                            </td>
                            </tr>
                            <tr align="right">
                                <td width="32.5%" ></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>';
            $html .= '<div class="px-5 sm:px-16 py-10 sm:py-20">
        <div class="overflow-x-auto">
            <table  cellspacing="0"  border="0" cellpadding="2" rules="rows">
                <thead>
                    <tr bgcolor="#d9d9d9">
                        <th style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center">NAMA BARANG</th>
                        <th style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center">QTY</th>
                        <th style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center">HARGA</th>
                        <th style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center">Ongkos</th>
                        <th style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center">TOTAL</th>
                    </tr>
                </thead>
                <tbody>';
                $total_harga = 0;
                $grandtotal = 0;
                $totalongkos=0;
              $total_harga = 0;
              foreach ($row->detail_barang  as $detailbarang) {
                $total_harga += $detailbarang->harga + $detailbarang->ongkos;
                $grandtotal = $total_harga + $row->ongkir;
                $totalongkos= $detailbarang->harga+$detailbarang->ongkos;

                $html .= '<tr>
                <td style="border-bottom: 0.5px solid black;">
                    <div>'.$detailbarang->nama_barang.'
                    <!-- <small>
                        <br>Kode Barcode :'.$detailbarang->kode_barcode.'
                        <br>Berat :'.$detailbarang->berat.'
                        <br>
                    </small> --> 
                    ';
                    // if($detailbarang->ongkos == 0){
                    //     $html .= '';
                    // }else{
                    //     $html .= 'Ongkos Produksi '.number_format($detailbarang->ongkos);
                    // }
                $html .= '
                </div>
                    </td>
                    <td style="border-bottom: 0.5px solid black;" align="center">1</td>
                    <td style="border-bottom: 0.5px solid black;" align="center">'.number_format($detailbarang->harga).'</td>
                    <td style="border-bottom: 0.5px solid black;" align="center">'.number_format($detailbarang->ongkos).'</td>
                    <td style="border-bottom: 0.5px solid black;" align="right">'.number_format($total_harga).'</td>
                </tr>';
              }
              $html .='<!-- <tr>
                    <td style="border-bottom: 0.5px solid black;" colspan="4">Ongkir</td>
                    <td style="border-bottom: 0.5px solid black;" align="right">'.number_format($row->ongkir) .'</td>
                </tr> -->
                <tr>
                    <td style="border-bottom: 0.5px solid black;" colspan="4" align="right">Total Harga</td>
                    <td style="border-bottom: 0.5px solid black;" align="right">'.number_format($grandtotal).' </td>
                </tr>';
                $html .='<tr>
                    <td colspan="4"></td>
                    <td align="right"></td>
                </tr>';
                $html .= '<tr>
                    <td colspan="4"></td>
                    <td align="right">';
            //   if  ($row->type_trx == "AMBIL") {
            //     $dp = $grandtotal * 50 / 100;
            //     $sisa = $grandtotal * 50 / 100; 
            //     $html .= '<div align="right"> Total Dp : '.number_format($dp) .'</div>
            //               <div align="right"> Sisa Bayar : '.number_format($sisa).'</div>';
            //     }else{
            //     $html .= '<div align="right">Sudah Lunas</div>';
            //     }
              $html .= '</td>
              </tr>';
              $html .= '</tbody>
                        </table>
                    </div>
                </div>
                ';
        // if ($row->type_trx == "AMBIL") {
        //     $html .= 'Barang di ambil di toko : ';
        //     foreach ($row->toko  as $toko) {
        //         $html .= $toko->nama_toko.'<br>'.$toko->alamat_lengkap.'<br>'.$toko->nama_kecamatan.''.$toko->nama_kota.','.$toko->kode_pos.','.$toko->nama_provinsi;
        //     }
        // }else{
        //     $html .= '<span color="#718096">Barang Diantar Dengan Kurir :'.  $row->jenis_courier. "-". number_format($row->ongkir).'</span>';
        // }
        // $html .= '
        // <table>
        //     <tr>
        //         <!-- <td><br><br>&nbsp;&nbsp;Id Transaksi<br><br>&nbsp;&nbsp;<span color="#1C3FAA">#'.$row->id_trx.'</span></td> -->
        //         <td>
        //             <div align="right">Total Transasksi</div>
        //             <div align="right">'.number_format($grandtotal).'</div>';
        // if  ($row->type_trx == "AMBIL") {
        //     $dp = $grandtotal * 50 / 100;
        //     $sisa = $grandtotal * 50 / 100; 
        //     $html .= '<div align="right"> Total Dp : '.number_format($dp) .'</div>
        //               <div align="right"> Sisa Bayar : '.number_format($sisa).'</div>';
        // }else{
        //     $html .= '<div align="right">Sudah Lunas</div>';
        // }
        $html .= '
               <!-- </td>
            </tr>
        </table> -->
</div>
<!-- END: Invoice -->
</div>';
}

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Print Invoice ' . $nama_toko . '_' . $tgl_sekarang . '.pdf', 'I');
