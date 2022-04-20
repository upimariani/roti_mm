<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_halaman_utama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_chatting');
        $this->load->model('m_dashboard');
    }
    public function index()
    {
        $data = array(
            'daftar_chat' => $this->m_chatting->daftar_chat(),
            'jml_chat' => $this->m_dashboard->jml_chatting(),
            'jml_produk' => $this->m_dashboard->jml_produk(),
            'jml_admin' => $this->m_dashboard->jml_akunadmin(),
            'jml_order' => $this->m_dashboard->jml_order(),
            'jml_pelanggan' => $this->m_dashboard->jml_pelanggan(),
            'produk' => $this->m_dashboard->produk()
        );
        $this->load->view('admin/menu/head');
        $this->load->view('admin/menu/navbar');
        $this->load->view('admin/menu/aside');
        $this->load->view('admin/menu/vhalaman_utama', $data);
        $this->load->view('admin/menu/footer');
    }
}
