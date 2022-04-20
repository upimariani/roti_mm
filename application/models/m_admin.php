<?php
class m_admin extends CI_Model
{
    public function select_admin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        return $this->db->get()->result();
    }
    public function insert_admin($data)
    {
        $this->db->insert('admin', $data);
    }
    public function hapus($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Dihapus');
    }
    public function edit($id_admin)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_admin', $id_admin);
        return $this->db->get()->result();
    }
    public function proses_edit($id_admin)
    {
        $data = array(
            'id_admin' => $id_admin,
            'nama_admin' => $this->input->post('nama_admin'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );
        $this->db->where('id_admin', $data['id_admin']);
        $this->db->update('admin', $data);
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Diperbaharui');
    }
    public function kurir()
    {
        $this->db->select('*');
        $this->db->from('kurir');
        return $this->db->get()->result();
    }
}
