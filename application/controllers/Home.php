<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
		$tanggal = date('Y-m-d');
		$this->db->select('sum(harga) as total');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m-%d') =  '$tanggal'");
		$hari_ini = $this->db->get()->row()->total;

		$tanggal = date('Y-m');
		$this->db->select('sum(harga) as total');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m') =  '$tanggal'");
		$bulan_ini = $this->db->get()->row()->total;

		$tanggal = date('Y-m-d');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m-%d') =  '$tanggal'");
		$transaksi = $this->db->count_all_results();

		$mahasiswa = $this->db->from('mahasiswa')->count_all_results();
		$fakultas = $this->db->from('fakultas')->count_all_results();
		$prodi = $this->db->from('prodi')->count_all_results();
		$transaksi_terakhir = $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembayaran.id_mahasiswa')->order_by('tanggal', 'desc')->get('pembayaran', 4)->result_array();


		$beasiswamhs = $this->db->from('beasiswa_mahasiswa')->join('beasiswa', 'beasiswa_mahasiswa.id_beasiswa = beasiswa.id_beasiswa')->where('beasiswa.id_beasiswa', 1)->count_all_results();
		$beasiswamhs1 = $this->db->from('beasiswa_mahasiswa')->join('beasiswa', 'beasiswa_mahasiswa.id_beasiswa = beasiswa.id_beasiswa')->where('beasiswa.id_beasiswa', 3)->count_all_results();
		$nama_jigeum = date('M');
		$nama_1 =  date('M', strtotime("-1 Months"));
		$nama_2 =  date('M', strtotime("-2 Months"));
		$nama_3 =  date('M', strtotime("-3 Months"));
		$nama_4 =  date('M', strtotime("-4 Months"));

		$tanggal = date('Y-m', strtotime("-1 Months"));
		$this->db->select('sum(harga) as total');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m') =  '$tanggal'");
		$bulan_1 = $this->db->get()->row()->total;

		$tanggal = date('Y-m', strtotime("-2 Months"));
		$this->db->select('sum(harga) as total');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m') =  '$tanggal'");
		$bulan_2 = $this->db->get()->row()->total;

		$tanggal = date('Y-m', strtotime("-3 Months"));
		$this->db->select('sum(harga) as total');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m') =  '$tanggal'");
		$bulan_3 = $this->db->get()->row()->total;

		$tanggal = date('Y-m', strtotime("-4 Months"));
		$this->db->select('sum(harga) as total');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m') =  '$tanggal'");
		$bulan_4 = $this->db->get()->row()->total;

		$tanggal = date('Y-m');
		$this->db->select('sum(harga) as total');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m') =  '$tanggal'");
		$bulan_ini = $this->db->get()->row()->total;
		$tanggal = date('Y-m');
		$this->db->select('MAX(harga) as total');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m') =  '$tanggal'");
		$max = $this->db->get()->row()->total;
		$tanggal = date('Y-m');
		$this->db->select('MIN(harga) as total');
		$this->db->from('pembayaran')->where("DATE_FORMAT(tanggal, '%Y-%m') =  '$tanggal'");
		$min = $this->db->get()->row()->total;
		$maxend = 3 * ($max + $max);
		$minend = ($min + $min);
		$data = array(
			'halaman' => 'Dashboard',
			'hari_ini' => $hari_ini,
			'bulan_ini' => $bulan_ini,
			'transaksi' => $transaksi,
			'mahasiswa' => $mahasiswa,
			'fakultas' => $fakultas,
			'prodi' => $prodi,
			'beasiswamhs' => $beasiswamhs,
			'beasiswamhs1' => $beasiswamhs1,
			'nama_jigeum' => $nama_jigeum,
			'nama_1' => $nama_1,
			'nama_2' => $nama_2,
			'nama_3' => $nama_3,
			'nama_4' => $nama_4,
			'bulan_1' => $bulan_1,
			'bulan_2' => $bulan_2,
			'bulan_3' => $bulan_3,
			'bulan_4' => $bulan_4,
			'transaksi_terakhir' => $transaksi_terakhir,
			'maxend' => $maxend,
			'minend' => $minend,
		);
		$this->template->load('template', 'dashboard', $data);
	}
}
