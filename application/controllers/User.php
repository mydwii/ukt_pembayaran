<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('level') <> 'administrator') {
            redirect('auth');
        }
    }
    public function index()
    {
        $this->db->from('user'); {
            $this->db->order_by('nama', ' ASC');
            $user = $this->db->get()->result_array();
            $data = array(
                'user'  => $user,
                'halaman' => 'User',
            );
            $this->template->load('template', 'user_index', $data);
        }
    }
    public function simpan()
    {
        $this->db->from('user');
        $this->db->where('username', $this->input->post('username'));
        $cek = $this->db->get()->result_array();
        if ($cek != NULL) {
            $this->session->set_flashdata('alert', ' <div class="alert alert-danger alert-dismissible alert-alt fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>Alert!</strong> Username sudah dipakai!
        </div>');
            redirect('user');
        }
        $data = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),

        );
        $this->db->insert('user', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Disimpan!
    </div>');
        redirect('user');
    }
    public function delete_data($id)
    {
        $where = array(
            'id_user' => $id
        );
        $this->db->delete('user', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Dihapus!
    </div>');
        redirect('user');
    }
    public function update()
    {
        $where = array(
            'id_user' => $this->input->post('id_user')
        );
        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->db->update('user', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Diubah!
    </div>');
        redirect('user');
    }
}
