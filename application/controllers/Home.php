<?php

    class Home extends CI_Controller
    {
        function index()
        {
            $dataNavbar['mapelNavbar'] = $this->Model_mapel->tampil_data()->result_array();
            $data['materiFooter'] = $this->Model_materi->tampil_data();
            $this->load->view('templates/header-index');
            $this->load->view('templates/navbar-index',$dataNavbar);
            $this->load->view('edumark/index',$data);
            $this->load->view('templates/footer0-index',$data);
            $this->load->view('templates/footer-index');
        }
        function pelajaran($idsub = 0)
        {
                
                if ($idsub == 0) {
                    $if = 1;
                    $data['mapel'] = $this->Model_mapel->tampil_data()->result();
                    $data['materi'] = $this->Model_materi->tampil_data();
                }
                else {
                    $where = array('id' => $idsub);
                    $where1 = array('id_mapel' => $idsub);
                    $data['mapel'] = $this->Model_mapel->show_data($where)->result();
                    $data['materi'] = $this->Model_materi->show_data($where1);
                }
                    $dataNavbar['mapelNavbar'] = $this->Model_mapel->tampil_data()->result_array();
                    $data['materiFooter'] = $this->Model_materi->tampil_data();
                    $this->load->view('templates/header-index');
                    $this->load->view('templates/navbar-index',$dataNavbar);
                    $this->load->view('edumark/pelajaran', $data);
                    $this->load->view('templates/footer0-index',$data);
                    $this->load->view('templates/footer-index');
        }
        function detail_materi($id)
        {
            if (isset($_SESSION['nama'])) {
            $where = array('id' => $id);
            $data['trans'] = $this->Model_pengguna->trans_data($_SESSION['id_user'])->result_array();
            $data['materi'] = $this->Model_materi->show_data($where)->result();
            $data['stop'] = $this->Model_materi->stop_data($_SESSION['id_user'],$id)->result_array();
            $data['latihan'] = $this->Model_latihan->show_data($id);
            $data['materiFooter'] = $this->Model_materi->tampil_data();
            $dataNavbar['mapelNavbar'] = $this->Model_mapel->tampil_data()->result_array();
            $this->load->view('templates/header-index');
            $this->load->view('templates/navbar-index',$dataNavbar);          
            $this->load->view('edumark/detail-materi',$data);
            $this->load->view('templates/footer0-index',$data);
            $this->load->view('templates/footer-index');
            }
            else {
                redirect(base_url());
            }
        }

        function latihan($id_materi,$id_latihan)
        {
            $id_terakhir = $this->Model_latihan->latihan_terakhir($id_materi);
            $id_l = $id_latihan-1;
            $pilihan = $this->input->post('pilihan');
            $jawaban = $this->input->post('jawaban');
            
            if ($pilihan != NULL) {
                $id_t = $id_terakhir+1;
                ($pilihan == $jawaban) ? $benar = 'b': $benar = 's';
                $array = array(
                    'id_pengguna' => $_SESSION['id_user'],
                    'id_latihan' => $id_l,
                    'pilihan' => $pilihan,
                    'benar' => $benar,
                );
                $this->Model_latihan->jawaban($array);
                    if($id_latihan == $id_t){
                        $Total = $this->Model_latihan->latihan_total($id_materi)->num_rows();
                        $benar = $this->Model_latihan->latihan_benar($_SESSION['id_user'],$id_materi)->num_rows();
                        $nilai = round(($benar / $Total) * 100);
                        $array = array(
                            'user_id' => $_SESSION['id_user'],
                            'materi_id' => $id_materi,
                            'status' => 1,
                            'nilai' => $nilai
                        );
                        $this->Model_latihan->status($array);
                        redirect(base_url('Home/profil/'.$_SESSION['id_user']));
                    }
                    base_url('Home/latihan/'.$id_materi.'/'.$id_latihan);        
            }
                $data['latihan'] = $this->Model_latihan->latihan($id_latihan,$id_materi);
                $this->load->view('templates/header-index');
                $this->load->view('edumark/latihan',$data);
                $this->load->view('templates/footer-index');
        }
        function profil($id_user = 0)
        {   
            if (isset($_SESSION['status'])) {
                if ($id_user != 0 && $_SESSION['role'] == 'admin') {
                    $id_pengguna = $id_user;
                }
                elseif($id_user == 0){
                    $id_pengguna = $_SESSION['id_user'];
                }
                $where = array('id' => $id_pengguna);
                $where1 = $id_pengguna;

                $data['pengguna'] = $this->Model_pengguna->ambil_data($where);
                if (isset($data['pengguna'])) {
                    $ar = array('id' => $data['pengguna']->id_login);
                    $data['login'] = $this->Model_login->ambil_data($ar);
                    $data['trans'] = $this->Model_pengguna->trans_data($where1)->result_array();
                    $data['join_data'] = $this->Model_pengguna->join_data($where1)->num_rows();
                    $data['join'] = $this->Model_pengguna->join($where1);
                }
                else{
                    $data['pengguna'] = $this->Model_guru->ambil_data($where);
                    $ar = array('id' => $data['pengguna']->id_login);
                    $data['login'] = $this->Model_login->ambil_data($ar);
                    $data['materi_guru'] = $this->Model_materi->tampil_data_guru($where1);
                }
                var_dump($data['pengguna'], $id_user);
                    
                    $dataNavbar['mapelNavbar'] = $this->Model_mapel->tampil_data()->result_array();
                    $data['total_materi'] = $this->Model_materi->total_materi();
                    $data['materiFooter'] = $this->Model_materi->tampil_data();
                    $this->load->view('templates/header-index');
                    $this->load->view('templates/navbar-index',$dataNavbar);       
                    $this->load->view('edumark/profil',$data);
                    $this->load->view('templates/footer0-index',$data);
                    $this->load->view('templates/footer-index');
            }
            else {
                redirect(base_url());
            }
        }

    }


?>