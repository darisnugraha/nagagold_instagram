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
$pdf->AddPage('P', 'A4');
$pdf->SetTitle('Laporan Stock Barang');
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
$X = 0;
foreach ($DataLaporanStockBarang->data as $row) {
	$fild[0]['kode_kategori']	 = $row->kode_kategori;
	$fild[0]['nama_kategori']	 = $row->nama_kategori;
	$fild[0]['kode_jenis']	 = $row->kode_jenis;
	$fild[0]['nama_jenis']	 = $row->nama_jenis;
	$detail[$X]['nama_barang'] 	= $row->nama_barang;
	$detail[$X]['kode_barcode'] 	= $row->kode_barcode;
	$detail[$X]['berat'] 	= $row->berat;
	$detail[$X]['stock_on_hand'] 	= $row->stock_on_hand;
	$fild[0]['detail_barang']	 = $detail;
	$X++;
}

// foreach ($fild as $rows) {
// 	var_dump($rows['kode_kategori']);
// 	die;
// }

$html = '
			
			<font size="10" face="Times New Roman">
			<table border="0">
				<tr>
					<td width="32.5%" ><img src="" width="150px"><br>Raya Utara, Alfalah, Tembok Banjaran, Kec. Adiwerna, Tegal, Jawa Tengah 52194 </td>
					<td align="center" width="36.5%"><b><font size="15px"><br>Laporan Stock ' . ucfirst($type_laporan) . ' Barang <br>Online  </font></b><br></td>
					<td width="30%"></td>
				</tr>
				<tr align="right">
					<td width="32.5%" ></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<table cellspacing="0"  border="0" cellpadding="2" rules="rows">';
foreach ($fild as $rows) {

	$html .= '
			<tr>
			<td colspan="5"></td>
		</tr>
            <tr>
                <td colspan="5">Kode Kategori : ' . $rows['kode_kategori'] . ' <br>Kode Jenis : ' . $rows['kode_jenis'] . '</td>
			</tr>
			
			<tr bgcolor="#d9d9d9">
				<th width="4%" style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center" >No</th>
				<th width="18%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Barcode</th>
				<th width="45%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Nama Barang</th>
				<th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Qty</th>
				<th width="25%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Berat</th>
			</tr>';
	$no = 1;
	$jml = count($rows['detail_barang']);
	$berat = 0;
	foreach ($rows['detail_barang'] as $show) {
		$berat += $show['berat'];
		$html .= '
			<tr>
				<td align="center">' . $no++ . '</td>
				<td align="center">' . $show['kode_barcode'] . '</td>
				<td align="center">' . $show['nama_barang'] . '</td>
				<td align="center">' . $show['stock_on_hand'] . '</td>
				<td align="center">' . $show['berat'] . '</td>
			</tr>
			
			';
	}
}

$html .= '
			<tr align="center" bgcolor="#d9d9d9">
				<td colspan="3" style="border-bottom: 1px solid black;"></td>
				<td style="border-bottom: 1px solid black;">' . number_format($jml) . '</td>
				<td style="border-bottom: 1px solid black;">' . $berat . '</td>
			</tr>
			
			';
$html .= '
			
			<tr bgcolor="#ffffff">
				<td colspan="7"><i><font size="8">Diexport Oleh ' . $user_export . '<br>Hari ' . $tgl_sekarang . ' - Jam ' . $jam_sekarang . '</font></i></td>
			</tr>

			</table></font>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Laporan Baki Barang ' . $nama_toko . '_' . $tgl_sekarang . '.pdf', 'I');
