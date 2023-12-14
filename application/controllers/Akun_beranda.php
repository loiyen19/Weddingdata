<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('M_menu_pelanggan');
        $this->load->model('M_join_tabel');
        $this->load->model('M_data');
        $this->load->library('cart');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index(){
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $data['cartItems'] = $this->cart->contents();
        $data['selected_menu'] = 'hero-normal';
        $data['isWeddingOrganizer'] = true;
        $data['active'] = 'akun';
        $data['title'] = ' Profile saya';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Akun/Tampil_akun_beranda', $data);
        $this->load->view('Pelanggan/layout/footer');
    }
    public function pesanan(){
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $data['cartItems'] = $this->cart->contents();
        
        $data['selected_menu'] = 'hero-normal';
        $data['isWeddingOrganizer'] = true;
        $data['active'] = 'akun';
        $data['title'] = ' Pesanan';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Akun/Tampil_pesanan_beranda', $data);
        $this->load->view('Pelanggan/layout/footer');

    }
}