<?php

    class Materi extends CI_Controller
    {

        function index()
        {
            $user = $this->session->userdata("nama");
            if (isset($_SESSION['nama']) && $_SESSION['role'] == "admin" || $_SESSION['role'] == "guru") {
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
            $this->load->view('templates/header-index');
            $this->load->view('templates/navbar-index');
            $data['mapel'] = $this->Model_mapel->tampil_data()->result();
            $this->load->view('admin/materi/tambah',$data);
            $this->load->view('templates/footer-index');
        }

        function tambah_aksi()
        {
            $mapel = $this->input->post('mapel');
            $materi= $this->input->post('materi');
            $deskripsi= $this->input->post('deskripsi');
            $tingkatan= $this->input->post('tingkatan');

            $data = array(
                'id_mapel' => $mapel,
                'id_guru' => $_SESSION['id_user'],
                'nama_materi' => $materi,
                'deskripsi' => $deskripsi,
                'tingkatan' => $tingkatan
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
            $this->load->view('templates/header-index');
            $this->load->view('templates/navbar-index');
            $this->load->view('admin/materi/show',$data);
            $this->load->view('templates/footer-index');

        }

        function edit($id)
        {
            $where = array('id' =>$id);
            $data['materi'] = $this->Model_materi->show_data($where)->result();
            $data['mapel'] = $this->Model_mapel->tampil_data()->result_array();
            $this->load->view('templates/header-index');
            $this->load->view('templates/navbar-index');
            $this->load->view('admin/materi/edit',$data);
            $this->load->view('templates/footer-index');

        }
        
        function edit_aksi()
        {
            $id = $this->input->post('id');
            $mapel = $this->input->post('mapel');
            $materi = $this->input->post('materi');
            $deskripsi = $this->input->post('deskripsi');
            $tingkatan = $this->input->post('tingkatan');

            $data = array(
                'id_mapel' => $mapel,
                'id_guru' => $_SESSION['id_user'],
                'nama_materi' => $materi,
                'deskripsi' => $deskripsi,
                'tingkatan' => $tingkatan
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