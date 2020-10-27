<?php

class Admin extends CI_Controller
{

        function index()
        {
            $user = $this->session->userdata("nama");
            if (isset($_SESSION['nama']) && $user == "admin" OR $_SESSION['role'] == 'guru') {
                $data['join'] = $this->Model_pengguna->join_status();
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