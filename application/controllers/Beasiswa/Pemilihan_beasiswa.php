<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilihan_Beasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->db->from('beasiswa_mahasiswa');
        $this->db->join('mahasiswa', 'beasiswa_mahasiswa.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->db->join('beasiswa', 'beasiswa_mahasiswa.id_beasiswa = beasiswa.id_beasiswa');
        $beasiswamhs = $this->db->get()->result_array();
        $this->db->from('beasiswa');
        $beasiswa = $this->db->get()->result_array();
        $this->db->from('mahasiswa');
        $this->db->order_by('nama_mahasiswa');
        $mahasiswa = $this->db->get()->result_array();
        $data = array(
            'halaman' => 'Pemilihan Beasiswa',
            'beasiswa' => $beasiswa,
            'beasiswamhs' => $beasiswamhs,
            'mahasiswa' => $mahasiswa,
        );

        $this->template->load('template', 'beasiswa/pemilihan_beasiswa', $data);
    }
    public function simpan()
    {
        $data = array(
            'id_beasiswa' => $this->input->post('id_beasiswa'),
            'id_mahasiswa' => $this->input->post('id_mahasiswa'),
            'status' => 'aktif',
        );
        $this->db->insert('beasiswa_mahasiswa', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Disimpan!
    </div>');
        redirect('beasiswa/pemilihan_beasiswa');
    }
    public function delete_data($id)
    {
        $where = array(
            'id_beasiswa_mhs' => $id
        );
        $this->db->delete('beasiswa_mahasiswa', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Dihapus!
    </div>');
        redirect('beasiswa/pemilihan_beasiswa');
    }
    public function update()
    {
        $where = array(
            'id_beasiswa_mhs' => $this->input->post('id_beasiswa_mhs')
        );
        $data = array(
            'id_beasiswa' => $this->input->post('id_beasiswa'),
            'id_mahasiswa' => $this->input->post('id_mahasiswa'),
            'status' => $this->input->post('status'),
        );
        $this->db->update('beasiswa_mahasiswa', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Diubah!
    </div>');
        redirect('beasiswa/pemilihan_beasiswa');
    }
}
