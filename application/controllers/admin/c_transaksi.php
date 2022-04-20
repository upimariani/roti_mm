<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_produk');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data = array(
            'menunggu' => $this->m_transaksi->select_menunggu(),
            'dikemas' => $this->m_transaksi->dikemas(),
            'dikirim' => $this->m_transaksi->select_kirim(),
            'produk' => $this->m_produk->select_produk(),
            'selesai' => $this->m_transaksi->select_retur()
        );
        $this->load->view('admin/menu/head');
        $this->load->view('admin/menu/navbar');
        $this->load->view('admin/menu/aside');
        $this->load->view('admin/menu/transaksi/v_transaksi', $data);
        $this->load->view('admin/menu/footer');
    }
    public function konfirmasi($id_transaksi)
    {
        $data['konfirmasi'] = $this->m_transaksi->konfirmasi($id_transaksi);
        redirect('admin/c_transaksi');
    }
    public function detail_order($id_transaksi)
    {
        $data['kurir'] = $this->m_admin->kurir();
        $data['detail'] = $this->m_transaksi->detail_order($id_transaksi);
        $data['produk'] = $this->m_transaksi->produk_detail($id_transaksi);
        $this->load->view('admin/menu/head');
        $this->load->view('admin/menu/navbar');
        $this->load->view('admin/menu/aside');
        $this->load->view('admin/menu/transaksi/v_detail_order', $data);
        $this->load->view('admin/menu/footer');
    }
    public function kirim_pesanan($id_transaksi)
    {
        $data['kirim'] = $this->m_transaksi->kirim($id_transaksi);
        redirect('Admin/c_transaksi');
    }
    public function return_barang()
    {
        $jml_retur = 0;
        $harga = $this->input->post('harga');
        $qty = $this->input->post('jumlah');
        $jml_retur = $harga * $qty;
        $data = array(
            'id_transaksi' => $this->input->post('id_transaksi'),
            'id_produk' => $this->input->post('nama'),
            'qty' => $this->input->post('jumlah'),
            'jumlah' => $jml_retur
        );
        $this->m_transaksi->return_barang($data);

        $update = array(
            'id_transaksi' => $this->input->post('id_transaksi'),
            'status_pengiriman' => 'selesai'
        );
        $this->db->where('id_transaksi', $update['id_transaksi']);
        $this->db->update('status_pengiriman', $update);

        $kurir = array(
            'id_kurir' => $this->input->post('kurir'),
            'status_kurir' => '0'
        );
        $this->db->where('id_kurir', $kurir['id_kurir']);
        $this->db->update('kurir', $kurir);

        //perhitungan point
        $grand_point = 0;
        $sebelum = $this->input->post('point'); //point sebelumny
        $total = $this->input->post('total');
        $grand_point = 2 / 100 * $total;
        $kal = $sebelum + $grand_point;
        $point = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'point' => $kal
        );
        $this->db->where('id_pelanggan', $point['id_pelanggan']);
        $this->db->update('pelanggan', $point);
        $this->session->set_flashdata('pesan', 'Data Retur Berhasil Disimpan!!!');
        redirect('admin/c_retur_barang');
    }
    public function selesai($id_transaksi)
    {
        //perhitungan point
        $grand_point = 0;
        $sebelum = $this->input->post('point'); //point sebelumny
        $total = $this->input->post('total');
        $grand_point = 2 / 100 * $total;
        $kal = $sebelum + $grand_point;
        $point = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'point' => $kal
        );
        $this->db->where('id_pelanggan', $point['id_pelanggan']);
        $this->db->update('pelanggan', $point);

        $kurir = array(
            'id_kurir' => $this->input->post('kurir'),
            'status_kurir' => '0'
        );
        $this->db->where('id_kurir', $kurir['id_kurir']);
        $this->db->update('kurir', $kurir);

        $selesai = 'selesai';
        $data = array(
            'status_pengiriman' => $selesai
        );
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('status_pengiriman', $data);
        $this->session->set_flashdata('pesan', 'Orderan Telah Selesai!!!');
        redirect('admin/c_transaksi');
    }
}
