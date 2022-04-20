<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_chatting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_chatting');
    }
    public function chatting($id_pelanggan)
    {
        $data = array(
            'chatting' => $this->m_chatting->chatting($id_pelanggan)
        );
        $this->load->view('admin/menu/head');
        $this->load->view('admin/menu/navbar');
        $this->load->view('admin/menu/aside');
        $this->load->view('admin/menu/vchatting_admin', $data);
        $this->load->view('admin/menu/footer');
    }
    public function send()
    {
        $data = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'admin_send' => $this->input->post('pesan'),
            'pelanggan_send' => '0'
        );
        $this->db->insert('chatting', $data);
        redirect('admin/c_chatting/chatting/' . $data['id_pelanggan']);
    }
}
