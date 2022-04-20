<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login_admin
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_login_admin');
    }
    public function login($username, $password)
    {
        $cek = $this->ci->m_login_admin->login_admin($username, $password);
        if ($cek) {
            $id_admin = $cek->id_admin;
            $nama_admin = $cek->nama_admin;

            //session
            $this->ci->session->set_userdata('id_admin', $id_admin);
            $this->ci->session->set_userdata('nama_admin', $nama_admin);
            redirect('admin/c_halaman_utama');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah!!!');
            redirect('admin/c_login_admin');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('id_admin');
        $this->ci->session->unset_userdata('nama_admin');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!');
        redirect('admin/c_login_admin');
    }
}

/* End of file user_login.php */
