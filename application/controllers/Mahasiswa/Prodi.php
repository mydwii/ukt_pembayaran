<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
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
        $this->db->from('prodi');
        $this->db->join('fakultas', 'fakultas.id_fakultas = prodi.id_fakultas');
        $this->db->order_by('prodi', ' ASC');
        $prodi = $this->db->get()->result_array();

        $data = array(
            'halaman' => 'Prodi',
            'prodi' => $prodi,
            'fakultas' => $this->db->get('fakultas')->result_array(),
        );
        $this->template->load('template', 'mahasiswa/prodi', $data);
    }
    public function simpan()
    {
        $this->db->from('prodi');
        $this->db->where('prodi', $this->input->post('prodi'));
        $cek = $this->db->get()->result_array();
        if ($cek != NULL) {
            $this->session->set_flashdata('alert', ' <div class="alert alert-danger alert-dismissible alert-alt fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>Success!</strong> Prodi Sudah Tersedia!
        </div>');
            redirect('mahasiswa/prodi');
        }
        $data = array(
            'prodi' => $this->input->post('prodi'),
            'id_fakultas' => $this->input->post('id_fakultas'),
        );
        $this->db->insert('prodi', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Disimpan!
    </div>');
        redirect('mahasiswa/prodi');
    }
    public function delete_data($id)
    {
        $where = array(
            'id_prodi' => $id
        );
        $this->db->delete('prodi', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Dihapus!
    </div>');
        redirect('mahasiswa/prodi');
    }
    public function update()
    {
        $where = array(
            'id_prodi' => $this->input->post('id_prodi'),
        );
        $data = array(
            'prodi' => $this->input->post('prodi'),
            'id_fakultas' => $this->input->post('id_fakultas'),
        );
        $this->db->update('prodi', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Diubah!
    </div>');
        redirect('mahasiswa/prodi');
    }
}
