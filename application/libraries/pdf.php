<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
 
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }public function Header() {
        // menentukan logo berdasrkan lokasi logo
        $image_file = K_PATH_IMAGES.'../tcpdf_logo.jpg';
		// membuat sebuah gambar dengan file gambar dari $image_file, koortdinat x=10, y=10, ukuran Width gambar 15, align T(top), dpi = 300
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // membuat tulisan dengan font helvetica, tebal, ukuran 10
        $this->SetFont('helvetica', 'B', 10);
        // menentukan judul yang akan tampil. width=0, height=15, text=<< TCPDF CODEDB.CO >>, align=C(center)
        $this->Cell(0, 15, '<< TCPDF CODEDB.CO >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
 
    // Page footer
    public function Footer() {
        // Membuat posisi footer pada 15 mm dari bawah
        $this->SetY(-15);
        // menentukan tulisan miring dan ukuran font 8
        $this->SetFont('helvetica', '', 8);
        // menampilkan nomor halaman
       // $this->Line(12, 35, 198, 35);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
        // $this->Cell(0, 11, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}
 
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */