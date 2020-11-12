<?php

    class Pengguna extends CI_Controller
    {

        function index()
        {
            if (isset($_SESSION['status']) && $_SESSION['nama'] == "admin") {
                $data['pengguna'] = $this->Model_pengguna->tampil_data()->result();
                $this->load->view('templates/header');
                $this->load->view('templates/navbar-admin');
                $this->load->view('admin/pengguna/index', $data);
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
            $this->load->view('admin/pengguna/tambah');
            $this->load->view('templates/footer');
        }

        function tambah_aksi()
        {
            $nama = $this->input->post('nama');
            $materi= $this->input->post('materi');
            $deskripsi= $this->input->post('deskripsi');

            $data = array(
                'nama_pel' => $nama,
                'materi' => $materi,
                'deskripsi' => $deskripsi
            );

                $this->Model_pengguna->simpan_data($data);
                $this->session->set_flashdata('pesan','Ditambahkan');
                redirect(base_url('pengguna'));
    
        }

        function show($id)
        {
            $where = array('id' =>$id);
            $data['pengguna'] = $this->Model_pengguna->show_data($where)->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/pengguna/show',$data);
            $this->load->view('templates/footer');

        }

        public function delete($id)
        {
            $where = array('id' =>$id);
            $this->session->sess_destroy();
            $this->Model_pengguna->hapus_data($where);
            redirect(base_url());
        }

        function edit_profil($id_pengguna, $id_login)
        {
            $where = array('id' => $id_pengguna);
            $where1 = array('id' => $id_login);
            if (isset($_SESSION['nama'])) {
            $dataNavbar['mapelNavbar'] = $this->Model_mapel->tampil_data()->result_array();
            if ($_SESSION['role'] == 'guru') {
                $data['pengguna'] = $this->Model_guru->ambil_data($where);
            }
            else {
                $data['pengguna'] = $this->Model_pengguna->ambil_data($where);
            }
            $data['login'] = $this->Model_login->ambil_data($where1);
                $this->load->view('templates/header-index');
                $this->load->view('templates/navbar-index',$dataNavbar);
                $this->load->view('edumark/edit-profil', $data);
                $this->load->view('templates/footer-index');
            } else {
                redirect(base_url());
            }
        }

        function edit_aksi()
        {
            $id     = $this->input->post('id');
            $nama   = $this->input->post('nama');
            $email  = $this->input->post('email');
            $hp     = $this->input->post('hp');
            
            $data = array(
                'nama'  => $nama,
                'email' => $email,
                'hp'    => $hp
            );
            $where = array (
                'id' => $id
            );
            $this->Model_pengguna->update_data($where, $data);

            //LOGIN
            $id_login     = $this->input->post('id_login');
            $username     = $this->input->post('username');

            $data1 = array(
                'username'    => $username
            );

            $where1 = array (
                'id' => $id_login
            );
            $this->Model_login->update_data($where1, $data1);

            //redirect
            redirect( base_url('Home/profil/'.$_SESSION['id_user']));
        }

        //TRANSAKSI
        public function transaksi()
        {
            $d = strtotime('now');
            $c = strtotime('+30 Days');

            $data = array(
                'id_pengguna' => $_SESSION['id_user'],
                'tanggal_transaksi' => date('Y-m-d', $d),
                'tanggal_selesai' => date('Y-m-d', $c)
            );
            $this->Model_pengguna->simpan_transaksi($data);
            redirect(site_url());
        }
        
    }


?>