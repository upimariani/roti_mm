<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }
    public function index()
    {
        $data = array(
            'select_admin' => $this->m_admin->select_admin(),
            'kurir' => $this->m_admin->kurir()
        );
        $this->load->view('admin/menu/head');
        $this->load->view('admin/menu/navbar');
        $this->load->view('admin/menu/aside');
        $this->load->view('admin/menu/admin/v_admin', $data);
        $this->load->view('admin/menu/footer');
    }
    public function insert_admin()
    {
        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama_admin' => $this->input->post('nama_admin'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $data['insert_admin'] = $this->m_admin->insert_admin($data);
            $this->session->set_flashdata('pesan', 'Data Admin Berhasil Disimpan');
            redirect('admin/c_admin');
        } else {
            $this->load->view('admin/menu/head');
            $this->load->view('admin/menu/navbar');
            $this->load->view('admin/menu/aside');
            $this->load->view('admin/menu/admin/v_input_admin');
            $this->load->view('admin/menu/footer');
        }
    }
    public function hapus($id_admin)
    {
        $data['hapus'] = $this->m_admin->hapus($id_admin);
        redirect('admin/c_admin');
    }
    public function edit($id_admin)
    {
        $data['edit'] = $this->m_admin->edit($id_admin);
        $this->load->view('admin/menu/head');
        $this->load->view('admin/menu/navbar');
        $this->load->view('admin/menu/aside');
        $this->load->view('admin/menu/admin/v_edit_admin', $data);
        $this->load->view('admin/menu/footer');
    }
    public function proses_edit($id_admin)
    {
        $data['edit'] = $this->m_admin->proses_edit($id_admin);
        redirect('admin/c_admin');
    }
    public function insert_kurir()
    {
        $data = array(
            'nama_kurir' => $this->input->post('nama_kurir'),
            'area' => $this->input->post('area'),
            'status_kurir' => '0'
        );
        $this->db->insert('kurir', $data);
        $this->session->set_flashdata('pesan', 'Data Kurir Berhasil Ditambahkan!!!');
        redirect('admin/c_admin');
    }
    public function edit_kurir($id_kurir)
    {
        $data = array(
            'nama_kurir' => $this->input->post('nama_kurir'),
            'area' => $this->input->post('area')
        );
        $this->db->where('id_kurir', $id_kurir);
        $this->db->update('kurir', $data);
        $this->session->set_flashdata('pesan', 'Data Kurir Berhasil Diperbaharui!!!');
        redirect('admin/c_admin');
    }
    public function hapus_kurir($id_kurir)
    {
        $this->db->where('id_kurir', $id_kurir);
        $this->db->delete('kurir');
        $this->session->set_flashdata('pesan', 'Data Kurir Berhasil Dihapus!!!');
        redirect('admin/c_admin');
    }
}
