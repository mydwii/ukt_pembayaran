<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan extends CI_Controller
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

        $data = array(
            'halaman' => 'Golongan',
            'golongan' => $golongan,
        );
        $this->template->load('template', 'mahasiswa/golongan', $data);
    }
    public function simpan()
    {
        $data = array(
            'golongan' => $this->input->post('golongan'),
            'gaji_orang_tua' => $this->input->post('gaji_orang_tua'),
        );
        $this->db->insert('golongan', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Disimpan!
    </div>');
        redirect('mahasiswa/golongan');
    }
    public function delete_data($id)
    {
        $where = array(
            'id_golongan' => $id
        );
        $this->db->delete('golongan', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Dihapus!
    </div>');
        redirect('mahasiswa/golongan');
    }
    public function update()
    {
        $where = array(
            'id_golongan' => $this->input->post('id_golongan')
        );
        $data = array(
            'golongan' => $this->input->post('golongan'),
            'gaji_orang_tua' => $this->input->post('gaji_orang_tua'),
        );
        $this->db->update('golongan', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Diubah!
    </div>');
        redirect('mahasiswa/golongan');
    }
}
