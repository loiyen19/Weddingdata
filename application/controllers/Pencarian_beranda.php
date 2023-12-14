<?php
class Pencarian_beranda extends CI_Controller
{

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
        $this->cbrs = new Cbrs();
    }

    public function index()
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }
        
        $keyword = $this->input->get('keyword');
        $data['pencarian'] = $this->M_menu_pelanggan->cariData($keyword);

        $data['produkrek'] = $this->M_data->getAllProducts();
        
        $data['selected_menu'] = 'hero';
        $data['isWeddingOrganizer'] = false;
        $data['active'] = 'home';
        $data['title'] = 'Pencarian';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Pencarian/Tampil_cari_beranda', $data);
        $this->load->view('Pelanggan/layout/footer');
    }

    private function processDataWithCbrs($produkrek) {
        $data = [];
        foreach ($produkrek as $val) {
            $data[$val->ID_produk] = $this->pre_process($val->Nama_produk . ' ' . $val->Harga);
        }

        $this->cbrs->create_index($data);
        $this->cbrs->idf();
        $w = $this->cbrs->weight();
        // Lakukan operasi Cbrs sesuai kebutuhan Anda
    }
    private function pre_process($str) {
        // Fungsi pre-processing seperti yang Anda lakukan sebelumnya
        return strtolower($str);
    }
}
