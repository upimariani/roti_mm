<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login_pelanggan
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_login_pelanggan');
    }
    public function login($username, $password)
    {
        $cek = $this->ci->m_login_pelanggan->login_pelanggan($username, $password);
        if ($cek) {
            $id_pelanggan = $cek->id_pelanggan;
            $point = $cek->point;

            //session
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('point', $point);
            redirect('pelanggan/c_katalog');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah!!!');
            redirect('pelanggan/c_login');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('id_pelanggan') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Melakukan Login!!!');
            redirect('pelanggan/c_login');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('point');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!!');
        redirect('pelanggan/c_login');
    }
}
