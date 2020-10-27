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
}