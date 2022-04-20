<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laporan');
        $this->load->library('pdf');
    }
    function produk()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN DAFTAR PRODUK ROTI MM', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(30, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(50, 6, 'NAMA PRODUK', 1, 0, 'C');
        $pdf->Cell(50, 6, 'RASA PRODUK', 1, 0, 'C');
        $pdf->Cell(50, 6, 'HARGA', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $produk = $this->m_laporan->lap_produk();
        $no = 1;
        foreach ($produk as $row) {
            $pdf->Cell(30, 6, $no++ . '.', 1, 0, 'C');
            $pdf->Cell(50, 6, $row->nama_produk, 1, 0);
            $pdf->Cell(50, 6, $row->rasa_produk, 1, 0);
            $pdf->Cell(50, 6, 'Rp. ' . number_format($row->harga_produk, 0), 1, 1, 'C');
        }
        $pdf->Output();
    }
    function transaksi()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN DAFTAR PRODUK ROTI MM', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(50, 6, 'TGL ORDER', 1, 0, 'C');
        $pdf->Cell(50, 6, 'ID TRANSAKSI', 1, 0, 'C');
        $pdf->Cell(40, 6, 'NAMA PENERIMA', 1, 0, 'C');
        $pdf->Cell(40, 6, 'TOTAL BAYAR', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $transaksi = $this->m_laporan->lap_order();
        $no = 1;
        foreach ($transaksi as $row) {
            $pdf->Cell(10, 6, $no++ . '.', 1, 0, 'C');
            $pdf->Cell(50, 6, $row->tgl_order, 1, 0);
            $pdf->Cell(50, 6, $row->id_transaksi, 1, 0);
            $pdf->Cell(40, 6, $row->nama_penerima, 1, 0);
            $pdf->Cell(40, 6, 'Rp. ' . number_format($row->total_bayar, 0), 1, 1, 'C');
        }
        $pdf->Output();
    }
}
