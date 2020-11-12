<?php

    class Guru extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('Model_guru');
            $this->load->model('Model_login');
            $this->load->helper('url');
        }

        function index()
        {

            $user = $this->session->userdata("nama");
            if (isset($_SESSION['nama']) && $user == "admin") {
                $data['guru'] = $this->Model_guru->tampil_data()->result();
                $this->load->view('templates/header');
                $this->load->view('templates/navbar-admin');
                $this->load->view('admin/guru/index', $data);
                $this->load->view('templates/footer'); 
            }
            else {
                    redirect(base_url());
                }
            
        }

        function tambah()
        {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/guru/tambah');
            $this->load->view('templates/footer');
        }

        function tambah_aksi()
        {
            $nama = $this->input->post('nama');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $jk = $this->input->post('jk');
            $pekerjaan= $this->input->post('pekerjaan');
            $lulusan= $this->input->post('lulusan');
            $role= $this->input->post('role');

            $user = $this->input->post('user');
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            
            $data_login = array(
                'username' => $user,
                'email' => $email,
                'password' => md5($pass),
                'role' => $role
                );
            $this->Model_login->register($data_login);
            $last_id = $this->db->insert_id();

            $data = array(
                'id_login' => $last_id,
                'nama' => $nama,
                'tgl_lahir' => $tgl_lahir,
                'jk' => $jk,
                'pekerjaan' => $pekerjaan,
                'lulusan' => $lulusan,
                'role' => $role,
            );

                $this->Model_guru->simpan_data($data);
                $this->session->set_flashdata('pesan','Ditambahkan');
                redirect('guru');
    
        }

        function show($id)
        {
            $where = array('id' =>$id);
            $data['guru'] = $this->Model_guru->show_data($where)->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/guru/show',$data);
            $this->load->view('templates/footer');

        }

        function edit($id)
        {
            $where = array('id' =>$id);
            $data['guru'] = $this->Model_guru->edit_data($where)->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/guru/edit',$data);
            $this->load->view('templates/footer');

        }
        
        function edit_aksi()
        {
            $id = $this->input->post('id');

            $nama = $this->input->post('nama');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $jk = $this->input->post('jk');

            $data = array(
                'nama' => $nama,
                'tgl_lahir' => $tgl_lahir,
                'jk' => $jk,
            );
            $where = array(
                'id' => $id
            );
    
            $this->Model_guru->update_data($where, $data);

            $id_login= $this->input->post('id_login');
            $username = $this->input->post('username');
            $data1 = array(
                'username' => $username,
            );
            $where1 = array(
                'id' => $id_login
            );

            $this->Model_login->update_data($where1, $data1);


            redirect(base_url('Home/profil/'.$_SESSION['id_user']));

        }

        public function delete($id)
        {
            $where = array('id' =>$id);
            $this->Model_guru->hapus_data($where);
            $this->session->set_flashdata('pesan','Dihapus');
            redirect('guru');
        }
        
    }


?>s