<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('login');
    }
    public function login()
    {
        $this->db->from('user');
        $password = md5($this->input->post('password'));
        $this->db->where('username', $this->input->post('username'));
        $cek = $this->db->get()->row();
        if ($cek == NULL) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <div class="media">
                <div class="alert-left-icon-big">
                    <span><i class="mdi mdi-alert"></i></span>
                </div>
                <div class="media-body">
                    <h5 class="mt-1 mb-1">MAAF!</h5>
                    <p>Username Tidak Tersedia!</p>
                </div>
            </div>
        </div>');
            redirect('auth');
        } else if ($password == $cek->password) {
            $data = array(
                'id_user' => $cek->id_user,
                'username' => $cek->username,
                'nama' => $cek->nama,
                'level' => $cek->level,
            );
            $this->db->set($data);
            $this->db->where('id_user', $cek->id_user);
            $this->db->update('user');
            $this->session->set_userdata($data);
            echo "<script>
            alert('selamat, login berhasil');
            window.location='" . site_url('home') . "';
        </script>";
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Oh maaf! Password salah.
        </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
