<?php

class Vote extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Voting');
        $this->load->model('Siswa_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('form');
        $this->load->helper('url');
        // header('Cache-Control: no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
    }
    public function user()
    {
        $data['kandidat'] = $this->db->get('kandidat')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $user = $this->session->username;
        $data['cek'] = $this->db->get_where('users', ['nis' => $user])->row_array();

        $this->load->view('templates/header_user', $data);
        $this->load->view('home/user', $data);
        $this->load->view('templates/footer');
    }

    public function operator()
    {

        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header_operator', $data);
        $this->load->view('home/operator');
    }

    public function admin()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header', $data);
        $this->load->view('home/admin');
        $this->load->view('templates/footer');
    }

    public function siswa()
    {
        $data['tb_users'] = $this->db->get('users')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        if ($this->input->post('keyword')) {
            $data['tb_users'] = $this->Siswa_model->cariDataSiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/index');
        $this->load->view('templates/footer');
    }

    public function siswaOp()
    {
        $data['tb_users'] = $this->db->get('users')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        if ($this->input->post('keyword')) {
            $data['tb_users'] = $this->Siswa_model->cariDataSiswa();
        }
        $this->load->view('templates/header_operator', $data);
        $this->load->view('siswa/index_op');
        $this->load->view('templates/footer');
    }

    public function tambahDataSiswa()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'tambah data siswa';
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['generate'] = $this->Siswa_model->otomatisPass(8);
        $this->form_validation->set_rules('nis', 'Nis', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('siswa/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->tambahDataSiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('vote/siswa'));
        }
    }

    public function tambahDataSiswaOp()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'tambah data siswa';
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['generate'] = $this->Siswa_model->otomatisPass(8);
        $this->form_validation->set_rules('nis', 'Nis', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_operator', $data);
            $this->load->view('siswa/tambah_op', $data);
            // $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->tambahDataSiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('vote/siswaOp'));
        }
    }

    public function kandidat()
    {
        $data['tb_kandidat'] = $this->db->get('kandidat')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header', $data);
        $this->load->view('kandidat/index');
        $this->load->view('templates/footer');
    }

    public function tambahDataKandidat()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'tambah data kandidat';
        // $data['generate'] = $this->Siswa_model->otomatisPass(8);

        $this->form_validation->set_rules('nis', 'Nis', 'required|numeric');
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kandidat/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->tambahDataKandidat();
        }
    }


    public function reset()
    {
        $data = ["pemilih" => 'n'];
        $kan = ["suara" => 0];

        $this->db->update('users', $data);
        $this->db->update('kandidat', $kan);
        // $this->db->delete('probabilitas');
        $this->db->query("DELETE FROM probabilitas");
        redirect('vote/voter');
    }

    public function voter()
    {
        $data['x_belum'] = $this->db->query('SELECT * FROM users WHERE id_kelas = 1 AND pemilih = "n"')->num_rows();
        $data['x_udah'] = $this->db->query('SELECT * FROM users WHERE id_kelas = 1 AND pemilih = "y"')->num_rows();
        $data['xi_belum'] = $this->db->query('SELECT * FROM users WHERE id_kelas = 2 AND pemilih = "n"')->num_rows();
        $data['xi_udah'] = $this->db->query('SELECT * FROM users WHERE id_kelas = 2 AND pemilih = "y"')->num_rows();
        $data['xii_belum'] = $this->db->query('SELECT * FROM users WHERE id_kelas = 3 AND pemilih = "n"')->num_rows();
        $data['xii_udah'] = $this->db->query('SELECT * FROM users WHERE id_kelas = 3 AND pemilih = "y"')->num_rows();

        $data['tb_users'] = $this->db->get('users')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        if ($this->input->post('keyword')) {
            $data['tb_users'] = $this->Siswa_model->cariDataSiswa();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('menu/voter');
        $this->load->view('templates/footer');
    }

    public function hasil()
    {
        $data['tb_kandidat'] = $this->db->get('kandidat')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';

        $data['tb_kandidat'] = $this->db->get('kandidat')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['probabilitas'] = $this->db->get('probabilitas')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('menu/hasil', $data);
        $this->load->view('templates/footer');
    }

    public function voting_kandidat()
    {
        $data['tb_kandidat'] = $this->db->get('kandidat')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['probabilitas'] = $this->db->get('probabilitas')->result_array();

        $this->load->view('menu/hasil', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function hapus($nis)
    {
        $this->Siswa_model->hapusDataSiswa($nis);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('vote/siswa'));
    }

    public function edit($nis)
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Form Edit Data Siswa';
        $data['siswa'] = $this->Siswa_model->getSiswaByNis($nis);
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $level = $data['level'];

        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {

            if ($level == "admin") {
                $this->load->view('templates/header', $data);
            } else if ($level == "operator") {
                $this->load->view('templates/header_operator', $data);
            }

            $this->load->view('siswa/edit', $data);
            // $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->editDataSiswa();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect(base_url('vote/siswa'));
        }
    }


    public function edit_op($nis)
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Form Edit Data Siswa';
        $data['siswa'] = $this->Siswa_model->getSiswaByNis($nis);
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $level = $data['level'];

        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_operator', $data);
            $this->load->view('siswa/edit_op', $data);
            // $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->editDataSiswa();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect(base_url('vote/siswaOp'));
        }
    }

    public function editKandidat($no_kandidat)
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Form Edit Data Siswa';
        $data['kandidat'] = $this->Siswa_model->getKandidatByNo($no_kandidat);

        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('foto', 'Foto', 'required');
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kandidat/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->editDataKandidat();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect(base_url('vote/kandidat'));
        }
    }

    public  function detail_kandidat($no_kandidat)
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Detail Data Kandidat';
        $data['kandidat'] = $this->Siswa_model->getKandidatByNo($no_kandidat);
        $this->load->view('templates/header', $data);
        $this->load->view('kandidat/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_kandidat($no_kandidat)
    {
        $this->Siswa_model->hapusDataKandidat($no_kandidat);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('vote/kandidat'));
    }

    public function profile()
    {
    }

    public function visimisi()
    {
    }

    public function voting($nis, $id)
    {
        $kandidat = $this->db->get_where('kandidat', ['nis' => $nis])->row_array();
        $hasil = $kandidat['suara'] + 1;
        $kelas = $this->db->get_where('users', ['nis' => $this->session->username])->row_array();
        $probabilitas = [
            'nis' => $this->session->username,
            'id_kelas' => $kelas['id_kelas'],
            'no_kandidat' => $id
        ];
        $this->db->insert('probabilitas', $probabilitas);

        $suara = ["suara" => $hasil];
        $this->db->where('nis', $nis);
        $this->db->update('kandidat', $suara);

        $user = $this->session->username;
        $pemilih = ["pemilih" => 'y'];
        $this->db->where('nis', $user);
        $this->db->update('users', $pemilih);
        redirect('vote/user');
    }

    public function kataSandiUser()
    {
        $data['judul'] = 'E - Voting';
        $user = $this->session->username;
        $data['level'] = $this->session->level;

        $this->form_validation->set_rules('sandi_sekarang', 'Sandi Sekarang', 'required');
        $this->form_validation->set_rules('sandi_baru', 'Sandi Baru', 'required');
        $this->form_validation->set_rules('konfirmasi_sandi', 'Konfirmasi Sandi', 'required');

        if ($this->form_validation->run() == false) {
            $data['cek'] = $this->db->get_where('users', ['nis' => $user])->row_array();
            $this->load->view('templates/header_user', $data);
            $this->load->view('change/password');
        } else {
            $this->Siswa_model->ubahSandiUser();
        }
    }

    public function gantipass()
    {
        $data['judul'] = 'E - Voting';
        $user = $this->session->username;
        $data['level'] = $this->session->level;
        $level = $data['level'];

        $this->form_validation->set_rules('sandi_sekarang', 'Sandi Sekarang', 'required');
        $this->form_validation->set_rules('sandi_baru', 'Sandi Baru', 'required');
        $this->form_validation->set_rules('konfirmasi_sandi', 'Konfirmasi Sandi', 'required');

        if ($this->form_validation->run() == false) {
            $data['cek'] = $this->db->get_where('t_login', ['username' => $user])->row_array();

            if ($level == "admin") {
                $this->load->view('templates/header', $data);
            } elseif ($level == "operator") {
                $this->load->view('templates/header_operator', $data);
            }

            $this->load->view('change/change_password');
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->changePassword();
        }
    }
    public function kelas()
    {
        $data['tb_kelas'] = $this->db->get('kelas')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'Data Kelas';
        $data['jmlSiswaKelas1'] =  $this->db->get_where('users', ['id_kelas' => '1'])->num_rows();
        $data['jmlSiswaKelas2'] =  $this->db->get_where('users', ['id_kelas' => '2'])->num_rows();
        $data['jmlSiswaKelas3'] =  $this->db->get_where('users', ['id_kelas' => '3'])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('menu/kelas');
        $this->load->view('templates/footer');
    }

    public function tambahKelas()
    {
        $data['tb_kelas'] = $this->db->get('kelas')->result_array();
        $data['judul'] = 'Data Kelas';
        $data['level'] = $this->session->level;

        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('menu/tambahkelas', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->tambahKelas();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('vote/kelas'));
        }
    }

    public function hapusKelas($kelas)
    {
        $this->Siswa_model->hapusKelas($kelas);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('vote/kelas'));
    }

    public function editKelas($id_kelas)
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Form Edit Data Siswa';
        $data['kelas'] = $this->Siswa_model->getKelasByid($id_kelas);

        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('menu/editkelas', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->editKelas();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect(base_url('vote/kelas'));
        }
    }
}
