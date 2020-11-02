<?php 

class Model_guru extends CI_Model{
    function tampil_data(){
        return $this->db->get('guru');
    }

    function simpan_data($data){
        $this->db->insert('guru',$data);
    }

    function show_data($where){
        return $this->db->get_where('guru',$where);
    }

    function edit_data($where){
        return $this->db->get_where('guru',$where);

    }

    function update_data($where,$data){
        $this->db->where($where);
        $this->db->update('guru',$data);
    }

    function hapus_data($where){
        $this->db->where($where);
        $this->db->delete('guru',$where);
    }
    public function ambil_data($where)
    {
        $query = $this->db->get_where('guru', $where);
        $ret = $query->row();
        return $ret;
    }
    public function join_data($where1,$if = 0)
    {
        $select = array(
            'guru.*',
            'materi.*',
            'materi.id as id_materi'
        );
        $this->db->select($select);
        $this->db->from('materi');
        $this->db->join('guru', 'guru.id = materi.id_guru');
        $this->db->where('guru.id' ,$where1);
        $query = $this->db->get();
        return $query->result_array();
    }
}