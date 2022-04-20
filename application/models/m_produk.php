<?php
class m_produk extends CI_Model
{
    public function insert_produk($data)
    {
        $this->db->insert('produk', $data);
    }
    public function select_produk()
    {
        $paket = 'Paket';
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('rasa_produk != ', $paket);

        return $this->db->get()->result();
    }
    public function hapus($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
        $this->session->set_flashdata('pesan', 'Data Produk Berhasil Dihapus');
    }
    // public function paket()
    // {
    //     $this->db->select('count(id_produk) as produk, paket.id_paket, nama_paket, harga_paket');
    //     $this->db->from('paket');
    //     $this->db->join('detail_paket', 'paket.id_paket = detail_paket.id_paket', 'left');
    //     $this->db->group_by('nama_paket');

    //     return $this->db->get()->result();
    // }
    // public function detail_paket($id_paket)
    // {
    //     $this->db->select('*');
    //     $this->db->from('paket');
    //     $this->db->join('detail_paket', 'paket.id_paket = detail_paket.id_paket', 'left');
    //     $this->db->join('produk', 'produk.id_produk = detail_paket.id_produk', 'left');
    //     $this->db->where('paket.id_paket', $id_paket);
    //     $data['detail'] = $this->db->get()->result();
    //     $data['paket'] = $this->db->get_where('paket', array('id_paket' => $id_paket))->row();
    //     return $data;
    // }
    // public function hapus_paket($id_paket)
    // {
    //     $this->db->where('id_paket', $id_paket);
    //     $this->db->delete(array(
    //         'paket', 'detail_paket'
    //     ));
    //     $this->session->set_flashdata('pesan', 'Data Produk Berhasil Dihapus');
    // }

    public function diskon()
    {
        $diskon = 0;
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('diskon!=', $diskon);
        return $this->db->get()->result();
    }
    public function select_paket()
    {
        $paket = 'Paket';
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('rasa_produk=', $paket);
        return $this->db->get()->result();
    }
}
