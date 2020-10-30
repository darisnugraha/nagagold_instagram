
<?php

class MYPDF extends TCPDF
{
 
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
// $pdf->setDataHeader($tgl_awal, $tgl_akhir, $type, $user_export, $jam_sekarang, $tgl_sekarang);
$pdf->setHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
$pdf->AddPage('P', 'A4');
$pdf->SetTitle('Laporan Hacur Barang');
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
$html = '';
$html .= '
<font size="10" face="Times New Roman">
    <table border="0">
        <tr>
            <td width="32.5%" ><img src="' . base_url('assets/logo/LogoHeader.png') . '" width="150px"><br>Raya Utara, Alfalah, Tembok Banjaran, Kec. Adiwerna, Tegal, Jawa Tengah 52194 </td>
            <td align="center" width="36.5%"><b><font size="14px">Laporan ' . ucfirst($type) . ' Hancur Barang </font></b> <br><br> Periode <br> ' . $tgl_awal  . ' s/d ' . $tgl_akhir . '<br></td>
            <td align="right"></td>
        </tr>
        <tr align="right">
            <td width="32.5%" > </td>
            <td> </td>
            <td></td>
        </tr>
    </table></font>
   
<font size="10" face="Times New Roman">
<table cellspacing="0"  border="0" cellpadding="2" rules="rows">
<tr bgcolor="#d9d9d9">
    <th width="4%" style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center" >No</th>
    <th width="15%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Kode Barcode</th>
    <th width="20%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Nama Barang</th>
    <th width="15%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Kategori</th>
    <th width="15%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Jenis</th>
    <th width="15%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Berat</th>
    <th width="15%" style="border-top: 1px solid black; border-bottom: 1px solid black;" align="center">Berat Asli</th>
</tr>
';
$i=1;
$berat=0;
$beratasli=0;
foreach ($DataLaporanHancurBarang->data as $row) {
    $berat += $row->berat;
    $beratasli += $row->berat_asli;
    $html .= '
        <tr>
        <td width="4%" align="center">' . $i++ . '</td>
        <td width="15%" align="center">'.$row->kode_barcode.'</td>
        <td width="20%" align="center">'.$row->nama_barang.'</td>
        <td width="15%" align="center">'.$row->kode_kategori.'</td>
        <td width="15%" align="center">'.$row->kode_jenis.'</td>
        <td width="15%" align="center">'.$row->berat.'</td>
        <td width="15%" align="center">'.$row->berat_asli.'</td>
        </tr>
    ';
}
$html .= '
    <tr>
        <td colspan="4" style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center">Total Berat</td>
        <td  style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center"></td>
        <td  style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center">'.$berat.'</td>
        <td  style="border-top: 1px solid black; border-bottom: 1px solid black;"  align="center">'.$beratasli.'</td>
    </tr>
    <tr>
        <td colspan="4">
        <font size="8" face="Times New Roman"><i>Diexport Oleh : ' . $user_export . '<br> Hari : ' . $tgl_sekarang . ' - Jam : ' . $jam_sekarang . '</i></font>
        </td>
    </tr>
';
$html .= '</table></font>';

$pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();
$pdf->Output('Laporan Tambah Barang ' . $nama_toko . '_' . $tgl_sekarang . '.pdf', 'I');
?>


