<?php

    class Materi extends CI_Controller
    {

        function index()
        {
            $user = $this->session->userdata("nama");
            if (isset($_SESSION['nama']) && $user == "admin") {
                $data['materi'] = $this->Model_materi->tampil_data();
                $this->load->view('templates/header');
                $this->load->view('templates/navbar-admin');
                $this->load->view('admin/materi/index', $data);
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
            $data['mapel'] = $this->Model_mapel->tampil_data()->result();
            $this->load->view('admin/materi/tambah',$data);
            $this->load->view('templates/footer');
        }

        function tambah_aksi()
        {
            $mapel = $this->input->post('mapel');
            $materi= $this->input->post('materi');
            $deskripsi= $this->input->post('deskripsi');

            $data = array(
                'id_mapel' => $mapel,
                'nama_materi' => $materi,
                'deskripsi' => $deskripsi
            );

                $this->Model_materi->simpan_data($data);
                $this->session->set_flashdata('pesan','Ditambahkan');
                redirect(base_url('materi'));
    
        }

        function show($id)
        {
            $where = array('id' =>$id);
            $data['materi'] = $this->Model_materi->show_data($where)->result();
            $data['mapel'] = $this->Model_mapel->tampil_data()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/materi/show',$data);
            $this->load->view('templates/footer');

        }

        function edit($id)
        {
            $where = array('id' =>$id);
            $data['materi'] = $this->Model_materi->show_data($where)->result();
            $data['mapel'] = $this->Model_mapel->tampil_data()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/materi/edit',$data);
            $this->load->view('templates/footer');

        }
        
        function edit_aksi()
        {
            $id = $this->input->post('id');
            $mapel = $this->input->post('mapel');
            $materi = $this->input->post('materi');
            $deskripsi = $this->input->post('deskripsi');

            $data = array(
                'id_mapel' => $mapel,
                'nama_materi' => $materi,
                'deskripsi' => $deskripsi
            );
            $where = array(
                'id' => $id
            );
    
                $this->Model_materi->update_data($where, $data);
                $this->session->set_flashdata('pesan','Diubah');

    
                redirect('materi');

        }

        public function delete($id)
        {
            $where = array('id' =>$id);
            $this->Model_materi->hapus_data($where);
            $this->session->set_flashdata('pesan','Dihapus');
            redirect('materi');
        }
        
    }


?>