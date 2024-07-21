<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == null) {
            redirect('auth');
        }
    }
    public function index()
    {
        $this->db->from('fakultas');
        $this->db->order_by('fakultas', ' ASC');
        $fakultas = $this->db->get()->result_array();
        $data = array(
            'halaman' => 'Fakultas',
            'fakultas' => $fakultas,
        );
        $this->template->load('template', 'mahasiswa/fakultas', $data);
    }
    public function simpan()
    {
        $this->db->from('fakultas');
        $this->db->where('fakultas', $this->input->post('fakultas'));
        $cek = $this->db->get()->result_array();
        if ($cek != NULL) {
            $this->session->set_flashdata('alert', ' <div class="alert alert-danger alert-dismissible alert-alt fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>Success!</strong> Fakultas Sudah Tersedia!
        </div>');
            redirect('mahasiswa/fakultas');
        }
        $data = array(
            'fakultas' => $this->input->post('fakultas'),
        );
        $this->db->insert('fakultas', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Disimpan!
    </div>');
        redirect('mahasiswa/fakultas');
    }
    public function delete_data($id)
    {
        $where = array(
            'id_fakultas' => $id
        );
        $this->db->delete('fakultas', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Dihapus!
    </div>');
        redirect('mahasiswa/fakultas');
    }
    public function update()
    {
        $where = array(
            'id_fakultas' => $this->input->post('id_fakultas')
        );
        $data = array(
            'fakultas' => $this->input->post('fakultas'),
        );
        $this->db->update('fakultas', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Diubah!
    </div>');
        redirect('mahasiswa/fakultas');
    }
}
