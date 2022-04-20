<?php
class m_chatting extends CI_Model
{
    public function select_chat()
    {
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('chatting.id_pelanggan=', $id_pelanggan);
        return $this->db->get()->result();
    }


    //chatting admin
    public function daftar_chat()
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->group_by('chatting.id_pelanggan');
        return $this->db->get()->result();
    }
    public function chatting($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('chatting');
        $this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->where('chatting.id_pelanggan', $id_pelanggan);
        return $this->db->get()->result();
    }
}
