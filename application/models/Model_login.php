<?php 

class Model_login extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('login', $data);

    }

    public function login($where)
    {
        return $this->db->get_where('login', $where);
    }

    public function login_where($where)
    {
        $query = $this->db->get_where('login', $where);
        $ret = $query->row();
        return $ret;
    }
    public function login_where_id($where)
    {
        $query = $this->db->get_where('login', $where);
        $ret = $query->row();
        return $ret->id;
    }
    public function pengguna_where_id($whereid)
    {
        $query = $this->db->get_where('data_pengguna', array('id_login' => $whereid));
        $ret = $query->row();
        return $ret;
    }
    public function guru_where_id($whereid)
    {
        $query = $this->db->get_where('guru', array('id_login' => $whereid));
        $ret = $query->row();
        return $ret;
    }
    
}


?>