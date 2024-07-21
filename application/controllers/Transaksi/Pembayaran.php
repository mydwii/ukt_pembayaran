<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
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
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi')->join('golongan', 'mahasiswa.id_golongan = golongan.id_golongan');
        $this->db->order_by('nama_mahasiswa', ' ASC');
        $mhs = $this->db->get('')->result_array();
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $this->db->from('pembayaran');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->where("DATE_FORMAT(tanggal, '%Y-%m-%d') =  '$tanggal'");
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembayaran.id_mahasiswa');
        $pembayaran = $this->db->get()->result_array();
        $data = array(
            'halaman' => 'Pembayaran',
            'mahasiswa' => $mhs,
            'pembayaran' => $pembayaran,
        );
        $this->template->load('template', 'transaksi/pembayaran', $data);
    }
    public function transaksi($id_mahasiswa)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m');
        $this->db->from('pembayaran');
        $this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =  '$tanggal'");
        $jumlah = $this->db->count_all_results();
        $nota = date('ymd') . $jumlah + 1;
        $this->db->from('mahasiswa')->where('id_mahasiswa', $id_mahasiswa);
        $nama = $this->db->get()->row()->nama_mahasiswa;
        $golongan = $this->db->from('mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->join('golongan', 'mahasiswa.id_golongan = golongan.id_golongan', 'left')->get()->row();

        $tbl_mahasiswa = $this->db->select('mahasiswa.id_mahasiswa, pembayaran.semester')->from('mahasiswa')->where('mahasiswa.id_mahasiswa', $id_mahasiswa)->join('pembayaran', 'mahasiswa.id_mahasiswa = pembayaran.id_mahasiswa')->get()->result();
        if (!empty($tbl_mahasiswa)) {
            $dataSemesterCek = array();
            foreach ($tbl_mahasiswa as $tblM) {
                array_push($dataSemesterCek, $tblM->semester);
            }

            $semester = $this->db->from('semester')->where('golongan', $golongan->golongan)->where_not_in('semester', $dataSemesterCek)->get()->result_array();
        } else {
            $semester = $this->db->from('semester')->where('golongan', $golongan->golongan)->get()->result_array();
        }


        $harga = $this->db->select('semester, golongan, harga')->from('semester')->where('golongan', $golongan->golongan)->order_by('golongan', 'ASC')->get()->result();
        $this->db->from('beasiswa_mahasiswa');
        $this->db->join('mahasiswa', 'beasiswa_mahasiswa.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->db->join('beasiswa', 'beasiswa_mahasiswa.id_beasiswa = beasiswa.id_beasiswa');
        $this->db->where('mahasiswa.id_mahasiswa', $id_mahasiswa);
        $beasiswamhs = $this->db->get()->row();
        $this->db->from('beasiswa_mahasiswa');
        $this->db->join('mahasiswa', 'beasiswa_mahasiswa.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->db->join('beasiswa', 'beasiswa_mahasiswa.id_beasiswa = beasiswa.id_beasiswa');
        $this->db->where('mahasiswa.id_mahasiswa', $id_mahasiswa);
        $nominal = $this->db->get()->row();
        // Ambil data semester dari database berdasarkan id golongan

        $data = array(
            'halaman' => "Transaksi",
            'nama'     => $nama,
            'nota'  => $nota,
            'id_mahasiswa' => $id_mahasiswa,
            'golongan'  => $golongan,
            'semester'  => $semester,
            'harga'  => $harga,
            'beasiswamhs'  => $beasiswamhs,
            'nominal'  => $nominal,
        );

        // var_dump($data['harga']);die;

        $this->template->load('template', 'transaksi/transaksi_pembayaran', $data);
    }
    public function bayar()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');  // Gunakan H:i:s untuk format jam 24 jam dan menit

        $id_mahasiswa = $this->input->post('id_mahasiswa');
        $id_golongan = $this->input->post('id_golongan');
        $nota = $this->input->post('nota');
        $semester = $this->input->post('semester');
        $harga = $this->input->post('harga');
        $uang_bayar = floatval($this->input->post('uang_bayar'));
        $uang_tambahan = floatval($this->input->post('uang_tambahan'));

        // Gabungkan uang_bayar dan uang_tambahan
        $total_uang_bayar = $uang_bayar + $uang_tambahan;

        $data = array(
            'id_mahasiswa' => $id_mahasiswa,
            'id_golongan' => $id_golongan,
            'nota' => $nota,
            'semester' => $semester,
            'harga' => $harga,
            'uang_bayar' => $total_uang_bayar,
            'id_user' => $this->session->userdata('id_user'),
            'tanggal' => $tanggal,
        );
        $golongan = $this->session->userdata('golongan');

        if (!empty($data['id_mahasiswa']) && !empty($data['id_golongan']) && !empty($data['nota']) && !empty($data['semester']) && $data['harga'] != '-' && !empty($data['id_user']) && !empty($data['tanggal'])) {
            $this->db->insert('pembayaran', $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Success!</strong> Berhasil melakukan pembayaran
    </div>');
            redirect('transaksi/pembayaran/invoice/' . $this->input->post('nota'));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible alert-alt fade show">
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            <strong>Harap Data Tidak Kosong!
        </div>');
            redirect('transaksi/pembayaran/transaksi/' . $data['id_mahasiswa'] . '/' . $golongan);
        }
    }
    public function invoice($nota)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->order_by('a.tanggal', ' DESC');
        $this->db->where('a.nota', $nota);
        $this->db->join('mahasiswa b', 'a.id_mahasiswa = b.id_mahasiswa', 'left');
        $this->db->join('fakultas c', 'b.id_fakultas = c.id_fakultas', 'left');
        $this->db->join('prodi d', 'b.id_prodi = d.id_prodi', 'left');
        $pembayaran = $this->db->get()->row();
        $this->db->from('pembayaran a');
        $this->db->order_by('a.tanggal', ' DESC');
        $this->db->where('a.nota', $nota);
        $this->db->join('user c', 'a.id_user = c.id_user', 'left');
        $user = $this->db->get()->row();
        $data = array(
            'halaman' => "Invoice",
            'nota' => $nota,
            'pembayaran' => $pembayaran,
            'user' => $user,
        );
        $this->template->load('template', 'transaksi/invoice', $data);
    }
    public function print($nota)
    {
        $this->db->select('*');
        $this->db->from('pembayaran a');
        $this->db->order_by('a.tanggal', ' DESC');
        $this->db->where('a.nota', $nota);
        $this->db->join('mahasiswa b', 'a.id_mahasiswa = b.id_mahasiswa', 'left');
        $this->db->join('fakultas c', 'b.id_fakultas = c.id_fakultas', 'left');
        $this->db->join('prodi d', 'b.id_prodi = d.id_prodi', 'left');
        $pembayaran = $this->db->get()->row();
        $this->db->from('pembayaran a');
        $this->db->order_by('a.tanggal', ' DESC');
        $this->db->where('a.nota', $nota);
        $this->db->join('user c', 'a.id_user = c.id_user', 'left');
        $user = $this->db->get()->row();
        $data = array(
            'halaman' => "Invoice",
            'nota' => $nota,
            'pembayaran' => $pembayaran,
            'user' => $user,
        );
        $this->load->view('transaksi/struk', $data);
    }
}
