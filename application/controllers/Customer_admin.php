<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_admin extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
		$this->load->model('M_data');
		$this->load->model('M_join_tabel');
		$this->load->library('form_validation');
	}

    public function index(){
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
		$this->session->userdata('userName')])->row_array();

        $data['customer'] = $this->Madmin->get_all_data('tbl_customer')->result();
        
        $data['title'] = 'Customer';
		$this->load->view('Admin/layout/header', $data);
		$this->load->view('Admin/layout/menu');
		$this->load->view('Admin/customer/Tampil_customer_admin', $data);
		$this->load->view('Admin/layout/footer');
    }
	public function cs(){
		if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

		$data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
		$this->session->userdata('userName')])->row_array();

		$data['cs'] = $this->Madmin->get_all_data('tbl_hubungi')->result();

		$data['title'] = 'Customer Sevice';
		$this->load->view('Admin/layout/header', $data);
		$this->load->view('Admin/layout/menu');
		$this->load->view('Admin/customer/Tampil_cs_admin', $data);
		$this->load->view('Admin/layout/footer');

	}
}