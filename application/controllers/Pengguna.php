<?php

    class Pengguna extends CI_Controller
    {

        function index()
        {
            $user = $this->session->userdata("nama");
            if (isset($_SESSION['nama']) && $user == "admin") {
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

        function edit($id)
        {
            $where = array('id' =>$id);
            $data['pengguna'] = $this->Model_pengguna->edit_data($where)->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/pengguna/edit',$data);
            $this->load->view('templates/footer');

        }
        
        function edit_aksi()
        {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $materi = $this->input->post('materi');
            $deskripsi = $this->input->post('deskripsi');

            $data = array(
                'nama_pel' => $nama,
                'materi' => $materi,
                'deskripsi' => $deskripsi
            );
            $where = array(
                'id' => $id
            );
    
                $this->Model_pengguna->update_data($where, $data);
                $this->session->set_flashdata('pesan','Diubah');

    
                redirect('pengguna');

        }

        public function delete($id)
        {
            $where = array('id' =>$id);
            $this->Model_pengguna->hapus_data($where);
            $this->session->set_flashdata('pesan','Dihapus');
            redirect('pengguna');
        }
        
    }


?>