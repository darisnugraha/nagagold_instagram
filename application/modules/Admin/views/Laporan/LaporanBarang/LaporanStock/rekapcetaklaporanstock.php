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
$html = '
			
			<font size="10" face="Times New Roman">
			<table border="0">
				<tr>
					<td width="32.5%" ><img src="' . base_url('assets/logo/LogoHeader.png') . '" width="150px"><br>Raya Utara, Alfalah, Tembok Banjaran, Kec. Adiwerna, Tegal, Jawa Tengah 52194 </td>
					<td align="center" width="36.5%"><b><font size="15px"><br>Laporan  ' . ucfirst($type_laporan) . ' Stock Barang </font></b> <br><br></td>
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
				<th width="30%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Kategori</th>
				<th width="30%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Jenis</th>
				<th width="15%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Jumlah</th>
				<th width="25%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Berat</th>
			</tr>';
$no = 1;
$stock = 0;
$berat = 0;
foreach ($DataLaporanStockBarang->data as $row) {
	$stock += $row->stock_on_hand;
	$berat += $row->berat;
	if ($row->kode_kategori == "-" || $row->kode_jenis == "-") {
		$keterangankategori = "Belum Ada Kategori";
		$keteranganjenis = "Belum Ada Jenis";
	} else {
		$keteranganjenis = "$row->nama_jenis ($row->kode_jenis)";
		$keterangankategori = "$row->nama_kategori ($row->kode_kategori)";
	}
	$html .= '
	<tr>
		<td> ' . $no++ . ' </td>
		<td align="center"> ' . $keterangankategori . ' </td>
		<td align="center"> ' . $keteranganjenis . ' </td>
		<td align="center"> ' . $row->stock_on_hand  . ' </td>
		<td align="center"> ' . $row->berat  . ' </td>
	</tr>
	';
}

$html .= '
			<tr align="center" bgcolor="#d9d9d9">
				<td colspan="3" style="border-bottom: 1px solid black;">Total</td>
				<td style="border-bottom: 1px solid black;">' . number_format($stock) . '</td>
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
