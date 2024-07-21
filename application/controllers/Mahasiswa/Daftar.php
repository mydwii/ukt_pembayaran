<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
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
        $this->db->from('mahasiswa');
        $this->db->join('fakultas', 'fakultas.id_fakultas = mahasiswa.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi');
        $this->db->join('golongan', 'golongan.id_golongan = mahasiswa.id_golongan');
        $this->db->order_by('nim', ' ASC');
        $mhs = $this->db->get('')->result_array();
        $data = array(
            'halaman' => 'Daftar Mahasiswa',
            'mhs' => $mhs,
            'fakultas' => $this->db->get('fakultas')->result_array(),
            'prodi' => $this->db->get('prodi')->result_array(),
            'golongan' => $this->db->get('golongan')->result_array(),
            'mahasiswa' => $this->db->get('mahasiswa')->result_array(),
        );
        $this->template->load('template', 'mahasiswa/daftar_mahasiswa', $data);
    }

    public function ambil_data_prodi_berdasarkan_fakultas($id_fakultas = null)
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->db->select('prodi.prodi, prodi.id_prodi')
                ->from('prodi')
                ->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas')
                ->where('prodi.id_fakultas', $id_fakultas)
                ->order_by('prodi.prodi', 'ASC')
                ->get()
                ->result();

            echo json_encode(array(
                'status' => 'success',
                'data' => $data
            ));
        } else {
            echo json_encode(array(
                'status' => 'error',
                'data' => null
            ));
        }
    }
    public function simpan()
    {
        $this->db->from('mahasiswa');
        $this->db->where('nim', $this->input->post('nim'));
        $cek = $this->db->get()->result_array();
        if ($cek != NULL) {
            $this->session->set_flashdata('alert', ' <div class="alert alert-danger alert-dismissible alert-alt fade show">
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <strong>Success!</strong> NIM Mahasiswa Sudah Terpakai!
            </div>');
            redirect('mahasiswa/daftar');
        }
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'id_golongan' => $this->input->post('id_golongan'),
            'id_fakultas' => $this->input->post('fakultas'),
            'id_prodi' => $this->input->post('prodi'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'telp' => $this->input->post('telp'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->db->insert('mahasiswa', $data);

        // Mendapatkan ID mahasiswa yang baru saja diinsert
        $id_mahasiswa = $this->db->insert_id();

        // Memasukkan data ke tabel beasiswa_mahasiswa
        $data_beasiswa = array(
            'id_beasiswa' => 4,
            'id_mahasiswa' => $id_mahasiswa, // Menggunakan ID mahasiswa yang baru saja diinsert
            'status' => 'aktif',
        );
        $this->db->insert('beasiswa_mahasiswa', $data_beasiswa);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>Success!</strong> Data Berhasil Disimpan!
        </div>');
        redirect('mahasiswa/daftar');
    }
    public function delete_data($id)
    {
        $where = array(
            'id_mahasiswa' => $id
        );
        $this->db->delete('mahasiswa', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Dihapus!
    </div>');
        redirect('mahasiswa/daftar');
    }
    public function update()
    {
        $where = array(
            'id_mahasiswa' => $this->input->post('id_mahasiswa')
        );
        $data = array(
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'id_golongan' => $this->input->post('id_golongan'),
            'id_fakultas' => $this->input->post('fakultas'),
            'id_prodi' => $this->input->post('prodi'),
            'telp' => $this->input->post('telp'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->db->update('mahasiswa', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Data Berhasil Diubah!
    </div>');
        redirect('mahasiswa/daftar');
    }
    public function riwayat($id_mahasiswa)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m');
        $this->db->from('pembayaran');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembayaran.id_mahasiswa');
        $this->db->where('pembayaran.id_mahasiswa', $id_mahasiswa);
        $riwayat = $this->db->get()->result_array();
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.id_mahasiswa', $id_mahasiswa);
        $mhs = $this->db->get()->row()->nama_mahasiswa;
        $data = [
            'riwayat' => $riwayat,
            'mhs' => $mhs,
            'halaman' => 'Riwayat Pembayaran Mahasiswa'
        ];

        $this->template->load('template', 'mahasiswa/riwayat_mahasiswa', $data);
    }
}
