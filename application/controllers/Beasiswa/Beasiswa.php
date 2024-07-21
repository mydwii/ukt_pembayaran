<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->db->from('beasiswa');
        $beasiswa = $this->db->get()->result_array();
        $data = array(
            'halaman' => 'Beasiswa',
            'beasiswa' => $beasiswa
        );

        $this->template->load('template', 'beasiswa/beasiswa', $data);
    }
    public function simpan()
    {
        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'nominal' => $this->input->post('nominal'),
        );
        $this->db->insert('beasiswa', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Disimpan!
    </div>');
        redirect('beasiswa/beasiswa');
    }
    public function delete_data($id)
    {
        $where = array(
            'id_beasiswa' => $id
        );
        $this->db->delete('beasiswa', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Dihapus!
    </div>');
        redirect('beasiswa/beasiswa');
    }
    public function update()
    {
        $where = array(
            'id_beasiswa' => $this->input->post('id_beasiswa')
        );
        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'nominal' => $this->input->post('nominal'),
        );
        $this->db->update('beasiswa', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Diubah!
    </div>');
        redirect('beasiswa/beasiswa');
    }
}
