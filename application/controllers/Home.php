<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Voting');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');

        // header('Cache-Control: no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
    }

    public function index()
    {
        $datas = $this->session->active;
        if ($datas) {
            // $data['judul'] = 'Selamat datang';
            $level = $this->session->level;
            if ($level == "admin") {
                redirect(base_url('vote/admin'));
            } elseif ($level == "user") {
                redirect(base_url('vote/user'));
            } else {
                redirect(base_url('vote/operator'));
            }
        }


        $data['judul'] = 'Halaman Login';

        $this->load->view('templates/login/header', $data);
        $this->load->view('home/login');
        $this->load->view('templates/login/footer');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->db->get_where('t_login', ['username' => $username])->row_array();
        if ($cek) {
            $sandi = $cek['password'];
            if (password_verify($password, $sandi)) {
                // if ($sandi == $password) {
                $level = $cek['level'];

                $this->session->set_userdata('username', $username,);
                $this->session->set_userdata('active', true);
                $this->session->set_userdata('level', $level);

                if ($level == "user") {
                    redirect(base_url('vote/user'));
                } elseif ($level == "operator") {
                    redirect(base_url('vote/operator'));
                } else {
                    redirect(base_url('vote/admin'));
                }
            }
        }
    }
}
