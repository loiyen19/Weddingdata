<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('M_menu_pelanggan');
        $this->load->model('M_join_tabel');
        $this->load->library('cart');
        $this->load->model('M_data');
        $this->load->library('form_validation');
        $this->load->library('Tfidf');
        $this->Tfidf = new Tfidf();
    }

	public function index()
    {
      


        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();

        $data['semua_produk'] = $this->M_join_tabel->getProdukTerbaru();

        $data['produk'] = $this->Madmin->get_all_data('tbl_produk')->result();

        $data['cartItems'] = $this->cart->contents();

        $data['produkrek'] = $this->M_data->getAllProducts();
      
        // Proses data menggunakan tfdif
      

        $data['top_product'] = $this->M_menu_pelanggan->getTopOrderedProducts();
        $data['produk_terbaru'] = $this->M_menu_pelanggan->getNewestProducts();
        $data['produk_lama'] = $this->M_menu_pelanggan->getproduklama();


        $data['selected_menu'] = 'hero';
        $data['isWeddingOrganizer'] = false;
        $data['active'] = 'home';
        $data['title'] = ' Beranda';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Beranda/Tampil_beranda_pelanggan', $data);
        $this->load->view('Pelanggan/layout/footer');
    }

}
