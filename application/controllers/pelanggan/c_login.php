<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_login extends CI_Controller
{
    public function index()
    {
        $this->load->view('pelanggan/head');
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/vlogin');
        $this->load->view('pelanggan/footer');
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpon', 'Nomor Telepon', 'required|max_length[13]|min_length[11]');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pelanggan/head');
            $this->load->view('pelanggan/header');
            $this->load->view('pelanggan/vregister');
            $this->load->view('pelanggan/footer');
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_tlpon'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'point' => '0'
            );
            $this->m_login_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Anda Berhasil Registrasi!!! Silahkan Login!');

            redirect('pelanggan/c_login');
        }
    }
    //login pelanggan
    public function login()
    {
        $data = array(
            'tittle' => 'Login Pelanggan',
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->login_pelanggan->login($username, $password);
        redirect('pelanggan/c_katalog');
    }
    //logout pelanggan
    public function logout()
    {
        $this->login_pelanggan->logout();
    }
}
