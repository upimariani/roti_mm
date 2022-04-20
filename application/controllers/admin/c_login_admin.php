<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_login_admin extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->login_admin->login($username, $password);
            redirect('admin/c_halaman_utama');
        } else {
            $this->load->view('admin/login/header');
            $this->load->view('admin/login/v_login');
        }
    }
    //logout admin
    public function logout()
    {
        $this->login_admin->logout();
    }
}
