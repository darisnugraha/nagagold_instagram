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
$pdf = new MYPDF('L', 'mm', 'A4 POTRAIT', true, 'UTF-8', false);
$pdf->setHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
$pdf->AddPage('L', 'A4');
$pdf->SetTitle('Invoice Penjualan');
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
            <td width="32.5%" ><img src="'.base_url('assets/logo/LogoHeader.png').'" width="150px"><br>Raya Utara, Alfalah, Tembok Banjaran, Kec. Adiwerna, Tegal, Jawa Tengah 52194 </td>
            <td align="center" width="36.5%"><b><font size="15px"><br>Laporan Transaksi Penjualan</font></b> <br><br>Periode<br><br> </td>
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
        <th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">BARCODE</th>
        <th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">NAMA BARANG</th>
        <th width="8%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">QTY</th>
        <th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">HARGA</th>
        <th width="10%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">ONGKOS</th>
        <th width="15%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">TOTAL HARGA</th>
    </tr>';
$no = 1;
foreach ($DetailTransaksi->data as $row) {
    $total_harga = 0;
    foreach ($row->detail_barang as $barang) {
        $total_harga += $detailbarang->harga;

		$html .= '
		<tr>
			<td align="center">' . $no++ . '</td>		
			<td align="center">' . $barang->kode_barcode . '</td>
			<td>' . $barang->nama_barang . '</td>
			<td align="center">1</td>
			<td align="center">' . number_format($barang->harga) . '</td>
			<td align="center">' . number_format($barang->ongkos) . '</td>
			<td align="center">' . number_format($barang->harga + $barang->ongkos) . '</td>
		</tr>
	';
	}
}
$html .= '
    <tr align="center" bgcolor="#d9d9d9">
        <td colspan="6" style="border-top: 1px solid black;border-bottom: 1px solid black;">Grand Total</td>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;">Rp.' . number_format($total_harga) . '</td>
    </tr>';
$html .= '
    <tr bgcolor="#ffffff">
        <td colspan="7"><i><font size="8">Diexport Oleh ' . $user_export . '<br>Hari ' . $tgl_sekarang . ' - Jam ' . $jam_sekarang . '</font></i></td>
    </tr>
    </table></font>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Invoice.pdf', 'I');
