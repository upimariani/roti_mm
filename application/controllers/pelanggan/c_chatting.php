<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_chatting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_chatting');
    }
    public function index()
    {
        $this->login_pelanggan->cek_halaman();
        $this->form_validation->set_rules('pesan', 'Pesan', 'required', array(
            'pesan' => '%s Harus Diisii!!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'chat' => $this->m_chatting->select_chat()
            );
            $this->load->view('pelanggan/head');
            $this->load->view('pelanggan/header');
            $this->load->view('pelanggan/vchatting', $data);
            $this->load->view('pelanggan/footer');
        } else {
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'pelanggan_send' => $this->input->post('pesan'),
                'admin_send' => '0'
            );
            $this->db->insert('chatting', $data);
            redirect('pelanggan/c_chatting');
        }
    }
}
