<?php
class m_laporan extends CI_Model
{
    public function lap_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
    public function lap_order()
    {
        $selesai = 'selesai';
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan', 'left');
        $this->db->join('status_pengiriman', 'transaksi.id_transaksi = status_pengiriman.id_transaksi', 'left');
        $this->db->where('status_pengiriman.status_pengiriman=', $selesai);
        return $this->db->get()->result();
    }
}
