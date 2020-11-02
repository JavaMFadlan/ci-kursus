<?php 

    class Model_latihan extends CI_Model
    {

        function tampil_data(){
            $select = array(
                'materi.nama_materi',
                'materi.id as id_materi',
                'lat_soal.id as id',
                'count(lat_soal.id) as Total'
            );
            $this->db->select($select);
            $this->db->from('lat_soal');
            $this->db->join('materi', 'lat_soal.id_materi = materi.id ');
            $this->db->group_by('materi.id');
            $query = $this->db->get();
            return $query->result_array();
        }
        function tampil_data1(){
            return $this->db->get('materi');
        }
    
        function simpan_data($data){
            $this->db->insert('lat_soal',$data);
        }
    
        function show_data($where){
            $this->db->select('*');
            $this->db->from('lat_soal');
            $this->db->where('id_materi', $where);
            $query = $this->db->get();
            return $query->result_array();
        }

        function update_data($where,$data){
            $this->db->where($where);
            $this->db->update('lat_soal',$data);
        }
    
        function hapus_data($where){
            $this->db->where($where);
            $this->db->delete('lat_soal',$where);
        }


        //latihan
        function latihan($where,$where1){
            $this->db->select('*');
            $this->db->from('lat_soal');
            $this->db->where('id', $where);
            $this->db->where('id_materi', $where1);
            $query = $this->db->get()->row_array();
            return $query;
        }
        function latihan_terakhir($where1){
            $this->db->select('*');
            $this->db->from('lat_soal');
            $this->db->where('id_materi', $where1);
            $query = $this->db->get()->last_row()->id;
            return $query;
        }

        function latihan_total($where1){
            $this->db->select('*');
            $this->db->from('lat_soal');
            $this->db->where('id_materi', $where1);
            $query = $this->db->get();
            return $query;
        }

        function latihan_benar($where1){
            $this->db->select('*');
            $this->db->from('jawaban_user');
            $this->db->where('id_pengguna', $where1);
            $this->db->where('benar','b');
            $query = $this->db->get();
            return $query;
        }

        function Jawaban($data){
            $this->db->insert('jawaban_user',$data);
        }
        function status($data){
            $this->db->insert('tugas',$data);
        }


    }
    
?>