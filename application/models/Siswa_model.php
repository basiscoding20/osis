<?php
class Siswa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('upload');
        $this->load->helper('date');
    }
    public function getAllSiswa()
    {
        //menampilkan data dari database
        // $query = $this->db->get('users');
        // return $query->result_array();
        // editDataSiswa
        //lebih mudah menggunakan method chining (method berantai)
        return $this->db->get('users')->result_array();
    }

    public function tambahDataSiswa()
    {
        // $cek = $this->db->get_where('users', ['username' => input->post('nis', true)])->row_array();
        // if ($cek[''])

        $tambahsiswa = [
            "nis" => $this->input->post('nis', true),
            "password" => $this->input->post('pass', true),
            "nama" => $this->input->post('nama', true),
            "tanggal_lahir" => $this->input->post('tgl', true),
            "jk" => $this->input->post('jk', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "pemilih" => 'n'
        ];

        $login = [
            "username" => $this->input->post('nis', true),
            "password" => password_hash($this->input->post('pass', true), PASSWORD_BCRYPT),
            "level" => 'user'
        ];

        $this->db->insert('t_login', $login);
        $this->db->insert('users', $tambahsiswa);
    }

    public function tambahDataKandidat()
    {
        $namaFile = $_FILES['foto']['name'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        $config['upload_path'] = 'assets/img/vote';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = uniqid() . '.' . $ekstensiGambar;

        $hasil = '';

        // $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
        $datestring = '%Y';
        $time = time();
        $year = mdate($datestring, $time);

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto')) {
            $data['error'] = $this->upload->display_errors();
            echo $data['error'];
            $hasil = 'default.png';
        } else {
            $data['success'] = $this->upload->data();
            echo $data['success'];
            $hasil = $config['file_name'];
        }

        $tambahkandidat = [
            "nis" => $this->input->post('nis', true),
            "foto" => $hasil,
            "visi" => $this->input->post('visi', true),
            "misi" => $this->input->post('misi', true),
            "periode" => $year
        ];
        $this->db->insert('kandidat', $tambahkandidat);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect(base_url('vote/kandidat'));
    }


    public function hapusDataSiswa($nis)
    {
        $this->db->where('nis', $nis);
        $this->db->delete('users');
    }

    public function hapusDataKandidat($no_kandidat)
    {
        $this->db->where('no_kandidat', $no_kandidat);
        $this->db->delete('kandidat');
    }

    public function hapusKelas($kelas)
    {
        $this->db->where('id_kelas', $kelas);
        $this->db->delete('kelas');
    }

    public function getSiswaByNis($nis)
    {
        return $this->db->get_where('users', ['nis' => $nis])->row_array();
    }

    public function getKandidatByNo($no_kandidat)
    {
        return $this->db->get_where('kandidat', ['no_kandidat' => $no_kandidat])->row_array();
    }

    public function getKelasById($kelas)
    {
        return $this->db->get_where('kelas', ['id_kelas' => $kelas])->row_array();
    }


    public function editDataSiswa()
    {
        $data = [
            "nis" => $this->input->post('nis', true),
            "nama" => $this->input->post('nama', true),
            "tanggal_lahir" => $this->input->post('tgl', true),
            "jk" => $this->input->post('jk', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "pemilih" => 'n'
        ];

        $this->db->where('nis', $this->input->post('nis'));
        $this->db->update('users', $data);
    }

    public function editDataKandidat()
    {
        $data = [
            "nis" => $this->input->post('nis', true),
            "foto" => $this->input->post('foto', true),
            "periode" => $this->input->post('periode', true),
        ];

        $this->db->where('no_kandidat', $this->input->post('no_kandidat'));
        $this->db->update('kandidat', $data);
    }

    public function ubahSandiUser()
    {
        $nis = $this->session->username;
        $password = $this->input->post('password', true);
        $sekarang = $this->input->post('sandi_sekarang', true);
        $baru = $this->input->post('sandi_baru', true);
        $konfirmasi = $this->input->post('konfirmasi_sandi', true);

        if ($sekarang != $password) {
            $this->session->set_flashdata('flash', 'Kata sandi sekarang <strong>Salah</strong>');
            redirect(base_url('vote/kataSandiUser'));
        } elseif ($konfirmasi != $baru) {
            $this->session->set_flashdata('flash', 'Konfirmasi kata sandi <strong>Salah</strong>');
            redirect(base_url('vote/kataSandiUser'));
        } else {
            $user = [
                "password" => $baru,
            ];

            $login = [
                "password" => password_hash($baru, PASSWORD_BCRYPT)
            ];

            $this->db->update('users', $user, ['nis' => $nis]);
            $this->db->update('t_login', $login, ['username' => $nis]);
            $this->session->set_flashdata('flash', 'Kata sandi berhasil <strong>Diubah</strong>');
            redirect(base_url('vote/kataSandiUser'));
        }
    }

    public function changePassword()
    {
        $nis = $this->session->username;
        $password = $this->input->post('password', true);
        $sekarang = $this->input->post('sandi_sekarang', true);
        $baru = $this->input->post('sandi_baru', true);
        $konfirmasi = $this->input->post('konfirmasi_sandi', true);

        if (password_verify($sekarang, $password)) {
            if ($konfirmasi != $baru) {
                $this->session->set_flashdata('flash', 'Konfirmasi kata sandi <strong>Salah</strong>');
                redirect(base_url('vote/gantipass'));
            } else {

                $login = [
                    "password" => password_hash($baru, PASSWORD_BCRYPT)
                ];

                $this->db->update('t_login', $login, ['username' => $nis]);
                $this->session->set_flashdata('flash', 'Kata sandi berhasil <strong>Diubah</strong>');
                redirect(base_url('vote/gantipass'));
            }
        } else {
            $this->session->set_flashdata('flash', 'Kata sandi sekarang <strong>Salah</strong>');
            redirect(base_url('vote/gantipass'));
        }
    }


    public function cariDataSiswa()
    {
        $keyword = $this->input->post('keyword', true);

        $this->db->like('nama', $keyword);
        $this->db->or_like('jk', $keyword);
        $this->db->or_like('nis', $keyword);
        $this->db->or_like('id_kelas', $keyword);

        return $this->db->get('users')->result_array();
    }

    public function otomatisPass($pass)
    {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, $pass);
    }

    public function tambahKelas()
    {
        $tambahKelas = [
            "id_kelas" => $this->input->post('id_kelas', true),
            "nama_kelas" => $this->input->post('nama_kelas', true)
        ];
        $this->db->insert('kelas', $tambahKelas);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect(base_url('vote/kelas'));
    }

    public function editKelas()
    {
        $data = [
            "id_kelas" => $this->input->post('id_kelas', true),
            "nama_kelas" => $this->input->post('nama_kelas', true),
        ];

        $this->db->where('id_kelas', $this->input->post('id_kelas'));
        $this->db->update('kelas', $data);
    }
}
