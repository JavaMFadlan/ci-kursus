<?php

    class Latihan extends CI_Controller
    {

        function index()
        {
            $user = $this->session->userdata("nama");
            if (isset($_SESSION['nama']) && $user == "admin") {
                $data['latihan'] = $this->Model_latihan->tampil_data();
                $data['materi'] = $this->Model_materi->tampil_data();
                $this->load->view('templates/header');
                $this->load->view('templates/navbar-admin');
                $this->load->view('admin/latihan/index', $data);
                $this->load->view('templates/footer');   
            }
            else {
                    redirect(base_url());
                }
            
        }

        function tambah()
        {
            $id_materi = $this->input->post('id_materi');
            $jumlah = $this->input->post('jumlah');
            $data['jumlah'] = $jumlah;
            $data['id_materi'] = $id_materi;
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/latihan/tambah',$data);
            $this->load->view('templates/footer');
        }

        function tambah_aksi()
        {
            $soal = $this->input->post('soal');
            $a = $this->input->post('a');
            $b = $this->input->post('b');
            $c = $this->input->post('c');
            $d = $this->input->post('d');
            $jawaban= $this->input->post('jawaban');

            $jumlah= $this->input->post('jumlah');
            $id_materi= $this->input->post('id_materi');

            for ($i=0; $i < $jumlah; $i++) { 
                $data = array(
                    'id_materi' => $id_materi[$i],
                    'soal' => $soal[$i],
                    'pil_a' => $a[$i],
                    'pil_b' => $b[$i],
                    'pil_c' => $c[$i],
                    'pil_d' => $d[$i],
                    'jawaban' => $jawaban[$i]
                );
                    $this->Model_latihan->simpan_data($data);
            }
            
                $this->session->set_flashdata('pesan','Ditambahkan');
                redirect(base_url('latihan'));
    
        }

        function show($id_materi)
        {
            $data['latihan'] = $this->Model_latihan->show_data($id_materi);
            $data['materi'] = $this->Model_latihan->tampil_data1()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/latihan/show',$data);
            $this->load->view('templates/footer');

        }

        function edit($id_materi)
        {
            $data['latihan'] = $this->Model_latihan->show_data($id_materi);
            $data['materi'] = $this->Model_latihan->tampil_data1()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/navbar-admin');
            $this->load->view('admin/latihan/edit',$data);
            $this->load->view('templates/footer');

        }
        
        function edit_aksi()
        {
            $id = $this->input->post('id');
            $soal = $this->input->post('soal');
            $a = $this->input->post('a');
            $b = $this->input->post('b');
            $c = $this->input->post('c');
            $d = $this->input->post('d');
            $jawaban= $this->input->post('jawaban');

            $id_materi= $this->input->post('id_materi');
            $jumlah = count($soal);
            for ($i=0; $i < $jumlah; $i++) { 
            $where = array('id' => $id[$i]);  
                $data = array(
                    'id_materi' => $id_materi[$i],
                    'soal' => $soal[$i],
                    'pil_a' => $a[$i],
                    'pil_b' => $b[$i],
                    'pil_c' => $c[$i],
                    'pil_d' => $d[$i],
                    'jawaban' => $jawaban[$i]
                );
                $this->Model_latihan->update_data($where,$data);

            }
            
                $this->session->set_flashdata('pesan','Ditambahkan');
                redirect(base_url('latihan'));

        }

        public function delete($id)
        {
            $where = array('id' =>$id);
            $this->Model_latihan->hapus_data($where);
            $this->session->set_flashdata('pesan','Dihapus');
            redirect('latihan');
        }
        
    }


?>