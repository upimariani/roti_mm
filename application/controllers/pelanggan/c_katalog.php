<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_katalog');
        $this->load->model('m_transaksi');
    }
    public function index()
    {
        $data = array(
            'select_produk' => $this->m_katalog->select(),
            'rank' => $this->m_katalog->rank_produk(),
            'paket' => $this->m_katalog->paket()
        );
        $this->load->view('pelanggan/head');
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/vkatalog', $data);
        $this->load->view('pelanggan/footer');
    }

    //add to cart
    public function add()
    {
        $this->login_pelanggan->cek_halaman();
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'picture' => $this->input->post('picture'),
            'qty_produk' => $this->input->post('qty_produk')
        );
        $this->cart->insert($data);

        $tot_qty = 0;
        foreach ($this->cart->contents() as $key => $value) {
            $tot_qty = $value['qty_produk'] - $value['qty'];
            $data = array(
                'qty_produk' => $tot_qty
            );
            $this->db->where('id_produk', $value['id']);
            $this->db->update('produk', $data);
        }
        redirect('pelanggan/c_katalog');
    }
    // public function add_paket()
    // {
    //     $this->login_pelanggan->cek_halaman();
    //     $data = array(
    //         'id' => $this->input->post('id_paket'),
    //         'qty' => $this->input->post('qty_paket'),
    //         'price' => $this->input->post('price_paket'),
    //         'name' => $this->input->post('name_paket'),
    //         'picture' => $this->input->post('foto_paket'),
    //         'qty_produk' => $this->input->post('qty_paket')
    //     );
    //     $this->cart->insert($data);
    //     redirect('pelanggan/c_katalog');
    // }
    //vcart
    public function cart()
    {
        $this->login_pelanggan->cek_halaman();

        $this->load->view('pelanggan/head');
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/vcart');
        $this->load->view('pelanggan/footer');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('pelanggan/c_katalog/cart');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty' => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        $tot_qty = 0;
        foreach ($this->cart->contents() as $key => $value) {
            $tot_qty = $value['qty_produk'] - $value['qty'];
            $data = array(
                'qty_produk' => $tot_qty
            );
            $this->db->where('id_produk', $value['id']);
            $this->db->update('produk', $data);
        }
        redirect('pelanggan/c_katalog/cart');
    }
    //checkout
    public function checkout()
    {
        $this->login_pelanggan->cek_halaman();
        $data = array(
            'point' => $this->m_katalog->account()
        );
        $this->login_pelanggan->cek_halaman();
        $this->load->view('pelanggan/head');
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/vcheckout', $data);
        $this->load->view('pelanggan/footer');
    }
    public function order()
    {
        //insert transaksi
        $tot_pembayaran = 0;
        $tot_bayar = $this->input->post('total_bayar');
        $point = $this->input->post('point');
        $tot_pembayaran = $tot_bayar - $point;
        $data = array(
            'id_transaksi' => $this->input->post('no_order'),
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'nama_penerima' => $this->input->post('nama_penerima'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('telepon'),
            'total_bayar' => $tot_pembayaran
        );
        $this->m_katalog->insert_transaksi($data);

        $point = array(
            'point' => '0'
        );
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->update('pelanggan', $point);


        $tot_qty = 0;
        foreach ($this->cart->contents() as $key => $value) {
            $tot_qty = $value['qty_produk'] - $value['qty'];
            $data = array(
                'qty_produk' => $tot_qty
            );
            $this->db->where('id_produk', $value['id']);
            $this->db->update('produk', $data);
        }

        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $data_rinci = array(
                'id_transaksi' => $this->input->post('no_order'),
                'id_produk' => $item['id'],
                'qty' => $this->input->post('qty' . $i++)
            );
            $this->m_katalog->insert_detail($data_rinci);
        }

        $data_status = array(
            'id_transaksi' => $this->input->post('no_order'),
            'status_pengiriman' => 'menunggu'
        );
        $this->m_katalog->insert_status($data_status);
        $this->cart->destroy();
        redirect('pelanggan/c_katalog/status_pengiriman');
    }

    //status_pengiriman
    public function status_pengiriman()
    {
        $this->login_pelanggan->cek_halaman();
        $data = array(
            'menunggu' => $this->m_transaksi->select_menunggu_pelanggan(),
            'proses' => $this->m_transaksi->order_diproses(),
            'dikirim' => $this->m_transaksi->order_dikirim(),
            'selesai' => $this->m_transaksi->order_selesai(),
            'profil' => $this->m_katalog->account() //profil akun pelanggan
        );
        $this->load->view('pelanggan/head');
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/vstatus_pengiriman', $data);
        $this->load->view('pelanggan/footer');
    }

    //batalkan pemesanan
    public function batal_pemesanan($id_transaksi)
    {
        $data['hapus'] = $this->m_transaksi->batal_pemesanan($id_transaksi);
        redirect('pelanggan/c_katalog/status_pengiriman');
    }

    //detail pemesanan 
    public function detail_pemesanan($id_transaksi)
    {
        $data = array(
            'detail' => $this->m_transaksi->detail_pemesanan($id_transaksi)
        );
        $this->load->view('pelanggan/head');
        $this->load->view('pelanggan/header');
        $this->load->view('pelanggan/vdetail_pemesanan', $data);
        $this->load->view('pelanggan/footer');
    }
}
