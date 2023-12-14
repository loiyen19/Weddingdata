<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
		$this->load->model('M_data');
		$this->load->model('M_join_tabel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Login Admin';
		$this->load->view('Admin/Login_admin', $data);
	}

	public function dashboard()
	{
		if (empty($this->session->userdata('userName'))) {
			redirect('adminpanel');
		}
		$data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
		$this->session->userdata('userName')])->row_array();

		$data['jumlah_jasa'] = $this->M_data->hitung_jasa();
		$data['jumlah_kategori'] = $this->M_data->hitung_kategori();
		$data['jumlah_order'] = $this->M_data->hitung_order();
		$data['jumlah_cs'] = $this->M_data->hitung_customer();
		$data['jumlah_bayar'] = $this->M_data->hitung_pembayaran();
		$data['jumlah'] = $this->M_data->hitungJumlahAngka();
		$data['jumlah_rating'] = $this->M_data->hitung_rating();

		$data['detail_order'] = $this->M_join_tabel->detail_order();
       

		$data['title'] = 'Dashboard';
		$this->load->view('Admin/layout/header', $data);
		$this->load->view('Admin/layout/menu');
		$this->load->view('Admin/Dashboard', $data);
		$this->load->view('Admin/layout/footer');
	}

	public function login()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');


		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'required' => 'Isikan username anda'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => 'Isikan password anda'
		));

		if ($this->form_validation->run() === FALSE) {
			// Validasi gagal, kembali ke halaman login dengan pesan error
			$data['title'] = 'Login Admin';
			$this->load->view('admin/Login_admin', $data);
		} else {
			$cek = $this->Madmin->cek_login($u, $p);

			if ($cek->num_rows() == 1) {
				$data_session = array(
					'userName' => $u,
					'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				redirect('adminpanel/dashboard');
			} else {
				// Validasi sukses, tetapi login gagal, tampilkan pesan error
				$this->session->set_flashdata('not', '<div class="alert alert-danger" role="alert">
		   Username atau Password Anda Salah.
		</div>');
				$data['title'] = 'Login Admin';
				$this->load->view('Admin/Login_admin', $data);
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('adminpanel');
		
	 }
}
