<?php
class m_login_pelanggan extends CI_Model
{
    public function login_pelanggan($username, $password)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
    public function register($data){
        $this->db->insert('pelanggan', $data);
        
    }
}
