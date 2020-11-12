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
        public function join_data($where1)
        {
            $this->db->select('*');
            $this->db->from('tugas');
            $this->db->where('user_id' ,$where1);
            $query = $this->db->get();
            return $query;
        }
        public function join($where1)
        {
            $select = array(
                'tugas.*',
                'materi.id_mapel',
                'materi.nama_materi',
                'materi.id as id_materi',
                'tugas.id as id_tugas',
                'tugas.status',
            );
            $this->db->select($select);
            $this->db->from('tugas');
            $this->db->join('materi', 'materi.id = tugas.materi_id');
            $this->db->where('tugas.user_id', $where1);
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

        //Transaksi

        public function simpan_transaksi($data)
        {
            $this->db->insert('transaksi', $data);
        }

        public function trans_data($id)
        {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->where('transaksi.id_pengguna', $id);
            $query = $this->db->get();
            return $query;
        }

        public function trans_update($id)
        {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->where('transaksi.id_pengguna', $id);
            $query = $this->db->get();
            return $query;
        }

        public function trans_delete($id)
        {
            $this->db->where('id_pengguna', $id);
            $this->db->delete('data_pengguna',array('id_pengguna' => $id));
        }

    }
    
?>