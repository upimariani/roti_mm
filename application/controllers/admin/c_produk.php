<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
    }
    public function select_produk()
    {
        $data = array(
            'select_produk' => $this->m_produk->select_produk(),
            'diskon' => $this->m_produk->diskon(),
            'paket' => $this->m_produk->select_paket()
        );
        $this->load->view('admin/menu/head');
        $this->load->view('admin/menu/navbar');
        $this->load->view('admin/menu/aside');
        $this->load->view('admin/menu/produk/v_produk', $data);
        $this->load->view('admin/menu/footer');
    }
    public function insert_produk()
    {
        $config['upload_path']          = './asset/gambar/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'select_produk' => $this->m_produk->select_produk(),
                'diskon' => $this->m_produk->diskon(),
                'paket' => $this->m_produk->select_paket()
            );
            $data['error'] = $this->upload->display_errors();
            $this->load->view('admin/menu/head');
            $this->load->view('admin/menu/navbar');
            $this->load->view('admin/menu/aside');
            $this->load->view('admin/menu/produk/v_produk', $data);
            $this->load->view('admin/menu/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'rasa_produk' => $this->input->post('rasa_produk'),
                'harga_produk' => $this->input->post('harga_produk'),
                'qty_produk' => $this->input->post('qty_produk'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $upload_data['file_name']
            );
            $this->m_produk->insert_produk($data);
            $this->session->set_flashdata('pesan', 'Data Produk Berhasil Disimpan');
            redirect('admin/c_produk/select_produk');
        }
    }
    public function hapus($id_produk)
    {
        $data['hapus'] = $this->m_produk->hapus($id_produk);
        redirect('admin/c_produk/select_produk');
    }
    public function edit($id_produk)
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './asset/gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'select_produk' => $this->m_produk->select_produk(),
                    'diskon' => $this->m_produk->diskon(),
                    'paket' => $this->m_produk->select_paket()
                );
                $this->load->view('admin/menu/head');
                $this->load->view('admin/menu/navbar');
                $this->load->view('admin/menu/aside');
                $this->load->view('admin/menu/produk/v_produk', $data);
                $this->load->view('admin/menu/footer');
            } else {
                $produk = $this->m_produk->select_produk();
                if ($produk->gambar !== "") {
                    unlink('./asset/gambar/' . $produk->gambar);
                }
                $upload_data =  $this->upload->data();
                $data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'rasa_produk' => $this->input->post('rasa_produk'),
                    'harga_produk' => $this->input->post('harga_produk'),
                    'qty_produk' => $this->input->post('qty_produk'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' =>  $upload_data['file_name']
                );
                $this->db->where('produk.id_produk', $id_produk);
                $this->db->update('produk', $data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
                redirect('admin/c_produk/select_produk');
            } //tanpa ganti gambar
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'rasa_produk' => $this->input->post('rasa_produk'),
                'harga_produk' => $this->input->post('harga_produk'),
                'qty_produk' => $this->input->post('qty_produk'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->db->where('produk.id_produk', $id_produk);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('admin/c_produk/select_produk');
        }
        redirect('admin/c_produk/select_produk');
    }
    // public function paket()
    // {
    //     $produk = count($this->input->post('id_produk'));
    //     for ($i = 0; $i < $produk; $i++) {
    //         $data[$i] = array(
    //             'id_produk' => $this->input->post('id_produk[' . $i . ']'),
    //             'id_paket' => $this->input->post('id_paket')
    //         );
    //         $this->db->insert('detail_paket', $data[$i]);
    //     }
    //     $paket = array(
    //         'id_paket' => $this->input->post('id_paket'),
    //         'nama_paket' => $this->input->post('nama_paket'),
    //         'harga_paket' => $this->input->post('harga')
    //     );
    //     $this->db->insert('paket', $paket);
    //     $this->session->set_flashdata('pesan', 'Data Paket Berhasil Disimpan!!!');

    //     redirect('admin/c_produk/select_produk');
    // }
    // public function detail_paket($id_paket)
    // {
    //     $data = array(
    //         'detail' => $this->m_produk->detail_paket($id_paket)
    //     );
    //     $this->load->view('admin/menu/head');
    //     $this->load->view('admin/menu/navbar');
    //     $this->load->view('admin/menu/aside');
    //     $this->load->view('admin/menu/produk/v_detail_paket', $data);
    //     $this->load->view('admin/menu/footer');
    // }
    // public function hapus_paket($id_paket)
    // {
    //     $data['hapus'] = $this->m_produk->hapus_paket($id_paket);
    //     redirect('admin/c_produk/select_produk');
    // }

    public function diskon()
    {
        $data = array(
            'id_produk' => $this->input->post('produk'),
            'diskon' => $this->input->post('besar_diskon')
        );
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
        $this->session->set_flashdata('pesan', 'Data Diskon Berhasil Disimpan!!!');
        redirect('admin/c_produk/select_produk');
    }
    public function hapus_diskon($id_produk)
    {
        $data = array(
            'diskon' => '0'
        );
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk', $data);
        $this->session->set_flashdata('pesan', 'Data Diskon Berhasil Dihapus!!!');
        redirect('admin/c_produk/select_produk');
    }
    public function insert_paket()
    {
        $config['upload_path']          = './asset/gambar/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'select_produk' => $this->m_produk->select_produk(),
                'diskon' => $this->m_produk->diskon(),
                'paket' => $this->m_produk->select_paket()
            );
            $data['error'] = $this->upload->display_errors();
            $this->load->view('admin/menu/head');
            $this->load->view('admin/menu/navbar');
            $this->load->view('admin/menu/aside');
            $this->load->view('admin/menu/produk/v_produk', $data);
            $this->load->view('admin/menu/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'nama_produk' => $this->input->post('nama_paket'),
                'rasa_produk' => 'Paket',
                'harga_produk' => $this->input->post('harga_paket'),
                'qty_produk' => $this->input->post('qty_paket'),
                'deskripsi' => $this->input->post('deskripsi_paket'),
                'gambar' => $upload_data['file_name']
            );
            $this->m_produk->insert_produk($data);
            $this->session->set_flashdata('pesan', 'Data Paket Berhasil Disimpan');
            redirect('admin/c_produk/select_produk');
        }
    }
    public function edit_paket($id_produk)
    {
        $this->form_validation->set_rules('nama_paket', 'Nama Produk', 'required', array('required' => '%s Mohon Untuk Diisi !!!'));
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './asset/gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'select_produk' => $this->m_produk->select_produk(),
                    'diskon' => $this->m_produk->diskon(),
                    'paket' => $this->m_produk->select_paket()
                );
                $this->load->view('admin/menu/head');
                $this->load->view('admin/menu/navbar');
                $this->load->view('admin/menu/aside');
                $this->load->view('admin/menu/produk/v_produk', $data);
                $this->load->view('admin/menu/footer');
            } else {
                $produk = $this->m_produk->select_paket();
                if ($produk->gambar !== "") {
                    unlink('./asset/gambar/' . $produk->gambar);
                }
                $upload_data =  $this->upload->data();
                $data = array(
                    'nama_produk' => $this->input->post('nama_paket'),
                    'rasa_produk' => 'Paket',
                    'harga_produk' => $this->input->post('harga_paket'),
                    'qty_produk' => $this->input->post('qty_paket'),
                    'deskripsi' => $this->input->post('deskripsi_paket'),
                    'gambar' => $upload_data['file_name']
                );
                $this->db->where('produk.id_produk', $id_produk);
                $this->db->update('produk', $data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diperbaharui !!!');
                redirect('admin/c_produk/select_produk');
            } //tanpa ganti gambar
            $data = array(
                'nama_produk' => $this->input->post('nama_paket'),
                'rasa_produk' => 'Paket',
                'harga_produk' => $this->input->post('harga_paket'),
                'qty_produk' => $this->input->post('qty_paket'),
                'deskripsi' => $this->input->post('deskripsi_paket'),
            );
            $this->db->where('produk.id_produk', $id_produk);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diperbaharui !!!');
            redirect('admin/c_produk/select_produk');
        }
        redirect('admin/c_produk/select_produk');
    }
}
