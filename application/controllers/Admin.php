<?php

class Admin extends CI_Controller
{

        function index()
        {
            $user = $this->session->userdata("nama");
            if (isset($_SESSION['nama']) && $user == "admin" OR $_SESSION['role'] == 'guru') {
                $data['join'] = $this->Model_pengguna->join_status();
                $data['guru'] = $this->Model_guru->tampil_data()->num_rows();
                $data['pengguna'] = $this->Model_pengguna->tampil_data()->num_rows();
                $data['mapel'] = $this->Model_mapel->tampil_data()->num_rows();
                $data['materi'] = $this->Model_materi->tampil_index()->num_rows();
                $this->load->view('templates/header');
                $this->load->view('templates/navbar-admin');
                $this->load->view('admin/data',$data);
                $this->load->view('templates/footer');  
            }
            else {
                    redirect(base_url());
                }
        }
}


?>