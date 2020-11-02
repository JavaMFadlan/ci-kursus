<?php 

    class Model_materi extends CI_Model
    {

        function tampil_data(){
            $this->db->select('*');
            $this->db->from('mata_pelajaran');
            $this->db->join('materi', 'mata_pelajaran.id = materi.id_mapel');
            $query = $this->db->get();
            return $query->result_array();
        }

        function total_materi(){
            $this->db->select('count(materi.id) as Total_materi');
            $this->db->from('materi');
            $query = $this->db->get();
            return $query->row();
        }
    
        function simpan_data($data){
            $this->db->insert('materi',$data);
        }
    
        function show_data($where){
            return $this->db->get_where('materi',$where);
        }

        function stop_data($stop, $where){
            $this->db->select('*');
            $this->db->from('tugas');
            $this->db->where('tugas.user_id', $stop);
            $this->db->where('tugas.materi_id', $where);
            $query = $this->db->get();
            return $query;
        }
    
        function update_data($where,$data){
            $this->db->where($where);
            $this->db->update('materi',$data);
        }
    
        function hapus_data($where){
            $this->db->where($where);
            $this->db->delete('materi',$where);
        }

    }
    
?>