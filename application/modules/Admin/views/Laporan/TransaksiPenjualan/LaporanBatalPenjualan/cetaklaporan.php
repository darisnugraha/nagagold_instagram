<?php
class MYPDF extends TCPDF
{

	// Page footer
	public function Footer()
	{
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}
$pdf = new MYPDF('L', 'mm', 'A4 LANDSCAPE', true, 'UTF-8', false);
$pdf->setHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
$pdf->AddPage('L', 'A4');
$pdf->SetTitle('Laporan Batal Transaksi Toko Mas Hidup');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$PDF_MARGIN_BOTTOM = 20;
$pdf->SetAutoPageBreak(true, $PDF_MARGIN_BOTTOM);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$i = 0;
$stok_masuk = 0;
$berat_masuk = 0;
$berat_masuk_as = 0;
date_default_timezone_set('Asia/Jakarta');
$date = date('d, F-Y H:i:s');
$html = '
			
			<font size="10" face="Times New Roman">
			<table border="0">
				<tr>
					<td width="32.5%" ><img src="" width="150px"><br>Raya Utara, Alfalah, Tembok Banjaran, Kec. Adiwerna, Tegal, Jawa Tengah 52194 </td>
					<td align="center" width="36.5%"><b><font size="15px"><br>Laporan Batal Penjualan</font></b> <br><br>Periode<br>' . $tgl_awal . ' s/d ' . $tgl_akhir . '<br> </td>
					<td width="30%"></td>
				</tr>
				<tr align="right">
					<td width="32.5%" ></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<table cellspacing="0"  border="0" cellpadding="2" rules="rows">
			<tr bgcolor="#d9d9d9">
				<th width="4%" style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center" >No</th>
				<th width="13%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Id Customer</th>
				<th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Kode Barcode</th>
				<th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Nama Barang</th>
				<th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Berat</th>
				<th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Kadar Cetak</th>
				<th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Ongkos</th>
				<th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Harga</th>
				<th width="8%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Qty</th>
				<th width="15%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Total Harga</th>
			</tr>';
$no = 1;
// $totalbabrang = 0;
$totalbabrang = 0;
$grandtotal = 0;
$grandsub = 0;
$totalberat=0;
foreach ($DataLaporanBarang->data as $row) {
	$totalbabrang = count($row->detail_barang);
	$grandtotal += count($row->detail_barang);
	$totalharga = 0;
	foreach ($row->detail_barang as $barang) {
		$totalharga += $barang->harga;
		$grandsub += $barang->harga;
		$totalberat += $barang->berat;
		$html .= '
		<tr>
			<td align="center">' . $no++ . '</td>		
			<td align="center">' . $row->kode_customer . '</td>
			<td align="center">' . $barang->kode_barcode . '</td>
			<td>' . $barang->nama_barang . '</td>
			<td align="center">' . $barang->berat . '</td>
			<td align="center">' . $barang->kadar_cetak . '</td>
			<td align="center">' . number_format($barang->ongkos) . '</td>
			<td align="center">' . number_format($barang->harga) . '</td>
			<td align="center">1</td>
			<td align="center">' . number_format($barang->harga) . '</td>
		</tr>
	';
	}
}
$html .= '
			<tr align="center" bgcolor="#d9d9d9">
				<td colspan="4" style="border-top: 1px solid black;border-bottom: 1px solid black;">Total</td>
				<td style="border-top: 1px solid black;border-bottom: 1px solid black;">' . $totalberat . '</td>
				<td style="border-top: 1px solid black;border-bottom: 1px solid black;"></td>
				<td style="border-top: 1px solid black;border-bottom: 1px solid black;"></td>
				<td style="border-top: 1px solid black;border-bottom: 1px solid black;"></td>
				<td style="border-top: 1px solid black;border-bottom: 1px solid black;">' . $grandtotal . '</td>
				<td style="border-top: 1px solid black;border-bottom: 1px solid black;">Rp.' . number_format($grandsub) . '</td>
			</tr>
			
			';
$html .= '
			
			<tr bgcolor="#ffffff">
				<td colspan="7"><i><font size="8">Diexport Oleh ' . $user_export . '<br>Hari ' . $tgl_sekarang . ' - Jam ' . $jam_sekarang . '</font></i></td>
			</tr>

			</table></font>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Laporan Baki Barang ' . $nama_toko . '_' . $tgl_sekarang . '.pdf', 'I');
