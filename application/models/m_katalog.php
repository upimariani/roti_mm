<?php
class m_katalog extends CI_Model
{
    public function select()
    {
        $paket = 'Paket';
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('rasa_produk!=', $paket);
        return $this->db->get()->result();
    }
    public function paket()
    {
        $paket = 'Paket';
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('rasa_produk=', $paket);
        return $this->db->get()->result();
    }
    public function insert_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }
    public function insert_detail($data_rinci)
    {
        $this->db->insert('detail_pemesanan', $data_rinci);
    }
    public function insert_status($data_status)
    {
        $this->db->insert('status_pengiriman', $data_status);
    }
    public function account()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->row();
    }
    public function rank_produk()
    {
        $query = $this->db->query("SELECT SUM(qty) as tot, detail_pemesanan.id_produk, nama_produk, harga_produk, gambar FROM `detail_pemesanan` JOIN produk ON detail_pemesanan.id_produk = produk.id_produk GROUP BY detail_pemesanan.id_produk ORDER BY tot DESC LIMIT 3")->result();
        return $query;
    }
}
