<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Semester extends CI_Controller
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
        $this->db->from('golongan');
        $this->db->order_by('golongan', ' ASC');
        $golongan = $this->db->get()->result_array();
        $this->db->from('semester');
        $this->db->order_by('semester', ' ASC');
        $semester = $this->db->get()->result_array();

        $data = array(
            'halaman' => 'Semester',
            'golongan' => $golongan,
            'semester' => $semester,
        );
        $this->template->load('template', 'mahasiswa/semester', $data);
    }
    public function simpan()
    {
        $data = array(
            'golongan' => $this->input->post('golongan'),
            'semester' => $this->input->post('semester'),
            'harga' => $this->input->post('harga'),
        );
        $this->db->insert('semester', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Disimpan!
    </div>');
        redirect('mahasiswa/semester');
    }
    public function delete_data($id)
    {
        $where = array(
            'id_semester' => $id
        );
        $this->db->delete('semester', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Dihapus!
    </div>');
        redirect('mahasiswa/semester');
    }
    public function update()
    {
        $where = array(
            'id_semester' => $this->input->post('id_semester')
        );
        $data = array(
            'semester' => $this->input->post('semester'),
            'golongan' => $this->input->post('golongan'),
            'harga' => $this->input->post('harga'),
        );
        $this->db->update('semester', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Diubah!
    </div>');
        redirect('mahasiswa/semester');
    }
}
