<?php 

    class Login extends CI_Controller
    {

        public function login_action()
        {
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $where = array(
                'email' => $email,
                'password' => md5($pass)
                );
            $cek = $this->Model_login->login($where)->num_rows();
            $row = $this->Model_login->login_where($where);
            if($cek > 0){
    
                $data_session = array(
                    'id_pengguna' => $row->id_pengguna,
                    'nama' => $row->username,
                    'email' => $email,
                    'status' => "login"
                    );
    
                $this->session->set_userdata($data_session);
                
                $user = $this->session->userdata("nama");
                if (isset($_SESSION['nama']) && $_SESSION['nama'] == "admin") {
                    redirect(base_url('Admin'));
                }
                else {
                    redirect(base_url());
                }
                
    
            }else{
                echo '<script>alert("Salah Password Atau Username");</script>';
            }
        }

        function register()
        {
            $this->load->view('templates/header');
            $this->load->view('login/register');
            $this->load->view('templates/footer');
        }

        function register_action()
        {
            $user = $this->input->post('user');
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            $tingkatan = $this->input->post('optradio');

            $nama = $this->input->post('nama');
            $hp = $this->input->post('hp');

               $data1 = array(
                'nama' => $nama,
                'email' => $email,
                'hp' => $hp,
                'tingkatan' => $tingkatan
            );

            $this->Model_pengguna->simpan_data($data1);
            $id = $this->db->insert_id();

                $data = array(
                    'id_pengguna' => $id,
                    'username' => $user,
                    'email' => $email,
                    'password' => md5($pass)
                    );

            $this->Model_login->register($data);
            redirect(base_url());
        }

        function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }

    }
    

?>