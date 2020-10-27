<?php

    class Mapel extends CI_Controller
    {

        function index()
        {
            $user = $this->session->userdata("nama");
            if (isset($_SESSION['nama']) && $user == "admin") {
                $data['mapel'] = $this->Model_mapel->tampil_data()->result();
                $this->load->view('templates/header');
                $this->load->view('templates/navbar-admin');
                $this->load->view('admin/mapel/index', $data);
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
            $this->load->view('admin/mapel/tambah');
            $this->load->view('templates/footer');
        }

        function tambah_aksi()
        {
            $nama = $this->input->post('nama');

            $data = array(
                'nama_pel' => $nama
            );

                $this->Model_mapel->simpan_data($data);
                $this->session->set_flashdata('pesan','Ditambahkan');
                redirect(base_url('mapel'));
    
        }

        function show($id)
        {
            $where = array('id' =>$id);
            $data['mapel'] = $this->Model_mapel->show_data($where)->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/mapel/show',$data);
            $this->load->view('templates/footer');

        }

        function edit($id)
        {
            $where = array('id' =>$id);
            $data['mapel'] = $this->Model_mapel->edit_data($where)->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/mapel/edit',$data);
            $this->load->view('templates/footer');

        }
        
        function edit_aksi()
        {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');

            $data = array(
                'nama_pel' => $nama
            );
            $where = array(
                'id' => $id
            );
    
                $this->Model_mapel->update_data($where, $data);
                $this->session->set_flashdata('pesan','Diubah');
    
                redirect('mapel');

        }

        public function delete($id)
        {
            $where = array('id' =>$id);
            $this->Model_mapel->hapus_data($where);
            $this->session->set_flashdata('pesan','Dihapus');
            redirect('mapel');
        }
        
    }


?>