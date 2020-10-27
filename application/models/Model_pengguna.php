<?php 

    class Model_pengguna extends CI_Model
    {
        function simpan_data($data){
            $this->db->insert('data_pengguna', $data);
        }

        function tampil_data(){
            return $this->db->get('data_pengguna');
        }
    
        function show_data($where){
            return $this->db->get_where('data_pengguna',$where);
        }
    
        function edit_data($where){
            return $this->db->get_where('data_pengguna',$where);
        }
    
        function update_data($where,$data){
            $this->db->where($where);
            $this->db->update('data_pengguna',$data);
        }
    
        function hapus_data($where){
            $this->db->where($where);
            $this->db->delete('data_pengguna',$where);
        }

        public function ambil_data($where)
        {
            $query = $this->db->get_where('data_pengguna', $where);
            $ret = $query->row();
            return $ret;
        }
        public function join_data($where1,$if = 0)
        {
            $select = array(
                'data_pengguna.*',
                'materi.id as id_materi',
                'materi.nama_materi',
                'materi.deskripsi',
                'materi.id_mapel',
                'tugas.id as id_tugas',
                'tugas.user_id',
                'tugas.status',
                'count(tugas.user_id) as Total'
            );
            $this->db->select($select);
            $this->db->from('tugas');
            $this->db->join('data_pengguna', 'tugas.user_id = data_pengguna.id ');
            $this->db->join('materi', 'tugas.materi_id = materi.id ');
            $this->db->where('data_pengguna.id' ,$where1);
            if($if == 0){
            $this->db->where('user_id', $where1);
            $this->db->where('status = 1');
            }
            $query = $this->db->get();
            return $query->result_array();
        }
        public function join_status()
        {
            $select = array(
                'data_pengguna.*',
                'materi.nama_materi',
                'materi.id as id_materi',
                'tugas.id as id_tugas',
                'count(tugas.user_id) as Total'
            );
            $this->db->select($select);
            $this->db->from('tugas');
            $this->db->join('data_pengguna', 'tugas.user_id = data_pengguna.id ');
            $this->db->join('materi', 'tugas.materi_id = materi.id ');
            $this->db->where('tugas.status = 1');
            $this->db->group_by('tugas.user_id');
            $query = $this->db->get();
            return $query->result_array();
        }

    }
    
?>