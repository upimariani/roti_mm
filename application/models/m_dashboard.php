<?php
class m_dashboard extends CI_Model
{
    public function jml_chatting()
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->group_by('id_pelanggan');
        return $this->db->get()->num_rows();
    }
    public function jml_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->num_rows();
    }
    public function jml_akunadmin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        return $this->db->get()->num_rows();
    }
    public function jml_order()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        return $this->db->get()->num_rows();
    }
    public function jml_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        return $this->db->get()->num_rows();
    }
    public function produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
}
