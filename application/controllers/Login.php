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
            if ($row->role == 'siswa') {
                $row_user = $this->Model_login->pengguna_where_id($row->id);
            }
            elseif ($row->role == 'guru') {
                $row_user = $this->Model_login->guru_where_id($row->id);
            }
            elseif ($row->role == 'admin') {
                $row_user = $this->Model_login->pengguna_where_id($row->id);
            }
            if($cek > 0){
    
                $data_session = array(
                    'id' => $row->id,
                    'id_user' => $row_user->id,
                    'role' => $row->role,
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
                base_url();
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
            $tingkatan = $this->input->post('tingkatan');
            $role = $this->input->post('role');

            $nama = $this->input->post('nama');
            $hp = $this->input->post('hp');

            $data = array(
                'username' => $user,
                'email' => $email,
                'password' => md5($pass),
                'role' => $role
                );

            $this->Model_login->register($data);
            $last_id = $this->db->insert_id();
                
               $data1 = array(
                'id_login' => $last_id,
                'nama' => $nama,
                'email' => $email,
                'hp' => $hp,
                'tingkatan' => $tingkatan,
            );

            $this->Model_pengguna->simpan_data($data1);
            redirect(base_url());
        }

        function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }

    }
    

?>