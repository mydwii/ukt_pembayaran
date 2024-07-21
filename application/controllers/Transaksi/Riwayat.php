<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
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
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m');
        $this->db->from('pembayaran');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembayaran.id_mahasiswa');
        $pembayaran = $this->db->get()->result_array();

        $data = array(
            'halaman' => 'Riwayat Transaksi',
            'pembayaran' => $pembayaran,
        );
        $this->template->load('template', 'transaksi/riwayat', $data);
    }
    public function laporan()
    {
        $tanggal1 = $this->input->get('tanggal1');
        $tanggal2 = $this->input->get('tanggal2');
        date_default_timezone_set('Asia/Jakarta');
        $this->db->from('pembayaran');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembayaran.id_mahasiswa');
        $this->db->where('tanggal >=', $tanggal1);
        $this->db->where('tanggal <=', $tanggal2);
        $pembayaran = $this->db->get()->result_array();
        $data = array(
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
            'pembayaran' => $pembayaran,
        );
        $this->load->view('transaksi/laporan', $data);
    }
}
