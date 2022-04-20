<?php
class m_transaksi extends CI_Model
{
    //pada admin
    public function select_menunggu()
    {
        $menunggu = 'menunggu';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('status_pengiriman', 'transaksi.id_transaksi = status_pengiriman.id_transaksi', 'left');
        $this->db->where('status_pengiriman.status_pengiriman=', $menunggu);
        return $this->db->get()->result();
    }
    public function konfirmasi($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_pengiriman' => 'dikemas'
        );
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('status_pengiriman', $data);
        $this->session->set_flashdata('pesan', 'Transaksi Segera Diproses');
    }
    public function dikemas()
    {
        $dikemas = 'dikemas';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('status_pengiriman', 'transaksi.id_transaksi = status_pengiriman.id_transaksi', 'left');
        $this->db->where('status_pengiriman.status_pengiriman=', $dikemas);
        return $this->db->get()->result();
    }

    //data detail order admin
    public function detail_order($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }
    //data produk order admin
    public function produk_detail($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_pemesanan', 'transaksi.id_transaksi = detail_pemesanan.id_transaksi', 'left');
        $this->db->join('produk', 'detail_pemesanan.id_produk = produk.id_produk', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }
    //update status kirim
    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_pengiriman' => 'dikirim'
        );
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('status_pengiriman', $data);

        $transaksi = array(
            'kurir' => $this->input->post('kurir')
        );
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $transaksi);

        $kurir = array(
            'id_kurir' => $this->input->post('kurir'),
            'status_kurir' => '1'
        );
        $this->db->where('id_kurir', $kurir['id_kurir']);
        $this->db->update('kurir', $kurir);
        $this->session->set_flashdata('pesan', 'Transaksi Segera Dikirim!!!');
    }
    //data order sedang dikirim
    public function select_kirim()
    {
        $dikirim = 'dikirim';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('status_pengiriman', 'transaksi.id_transaksi = status_pengiriman.id_transaksi', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->join('kurir', 'transaksi.kurir = kurir.id_kurir', 'left');
        $this->db->where('status_pengiriman.status_pengiriman=', $dikirim);
        return $this->db->get()->result();
    }

    public function return_barang($data)
    {
        $this->db->insert('retur_barang', $data);
    }

    public function select_retur()
    {
        $selesai = 'selesai';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('status_pengiriman', 'transaksi.id_transaksi = status_pengiriman.id_transaksi', 'left');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('status_pengiriman.status_pengiriman=', $selesai);
        return $this->db->get()->result();
    }
    public function retur()
    {
        $this->db->select('*');
        $this->db->from('retur_barang');
        $this->db->join('transaksi', 'transaksi.id_transaksi = retur_barang.id_transaksi', 'left');
        return $this->db->get()->result();
    }

    //----------------------------------------------------PELANGGAN------------------------------------------------------


    //status_pengiriman pada pelanggan
    public function select_menunggu_pelanggan()
    {
        $menunggu = 'menunggu';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('status_pengiriman', 'transaksi.id_transaksi = status_pengiriman.id_transaksi', 'left');
        $this->db->where('transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pengiriman.status_pengiriman=', $menunggu);
        return $this->db->get()->result();
    }
    //detail pemesanan pelanggan
    public function detail_pemesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('detail_pemesanan', 'transaksi.id_transaksi = detail_pemesanan.id_transaksi', 'left');
        $this->db->join('produk', 'detail_pemesanan.id_produk = produk.id_produk', 'left');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        return $this->db->get()->result();
    }
    //batalkan pemesanan
    public function batal_pemesanan($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete(array('transaksi', 'detail_pemesanan', 'status_pengiriman'));
        $this->session->set_flashdata('pesan', 'Data Produk Berhasil Dihapus');
    }

    //status pemesanan dikemas
    public function order_diproses()
    {
        $dikemas = 'dikemas';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('status_pengiriman', 'transaksi.id_transaksi = status_pengiriman.id_transaksi', 'left');
        $this->db->where('transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pengiriman.status_pengiriman=', $dikemas);
        return $this->db->get()->result();
    }
    public function order_dikirim()
    {
        $dikirim = 'dikirim';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('status_pengiriman', 'transaksi.id_transaksi = status_pengiriman.id_transaksi', 'left');
        $this->db->where('transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pengiriman.status_pengiriman=', $dikirim);
        return $this->db->get()->result();
    }
    public function order_selesai()
    {
        $selesai = 'selesai';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('status_pengiriman', 'transaksi.id_transaksi = status_pengiriman.id_transaksi', 'left');
        $this->db->where('transaksi.id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_pengiriman.status_pengiriman=', $selesai);
        return $this->db->get()->result();
    }
}
