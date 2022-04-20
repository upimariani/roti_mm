<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_retur_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
    }
    public function index()
    {
        $data = array(
            'retur' => $this->m_transaksi->retur()
        );
        $this->load->view('admin/menu/head');
        $this->load->view('admin/menu/navbar');
        $this->load->view('admin/menu/aside');
        $this->load->view('admin/menu/retur/vretur', $data);
        $this->load->view('admin/menu/footer');
    }
}
