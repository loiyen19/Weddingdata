<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jasa_beranda extends CI_Controller
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

    public function index()
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $config['base_url'] = base_url('index.php/Jasa_beranda/index');
        $config['total_rows'] = $this->M_menu_pelanggan->countTotalRows();
        $config['per_page'] = 6;

        $this->pagination->initialize($config);

        $offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['data'] = $this->M_menu_pelanggan->get_data($config['per_page'], $offset);



        $data['produk_terbaru'] = $this->M_join_tabel->getProdukTerbaru();
        $data['jml_produk'] = $this->M_data->hitung_jasa();
        $data['produk_lama'] = $this->M_menu_pelanggan->getproduklama();

        $data['cartItems'] = $this->cart->contents();

        $data['selected_menu'] = 'hero';
        $data['isWeddingOrganizer'] = false;
        $data['active'] = 'jasa';
        $data['title'] = ' Jasa';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Jasa/Tampil_jasa_beranda', $data);
        $this->load->view('Pelanggan/layout/footer');
    }

    public function detail_jasa_produk($id)
    {

        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $detail = $this->Madmin->detail_jasa($id);
        $data['detail'] = $detail;

        $data['gambar'] = $this->M_menu_pelanggan->foto($id);

        $data['produk'] = $this->Madmin->get_all_data('tbl_produk')->result();

        $data['average_rating'] = $this->M_menu_pelanggan->getAverageRating($id);

        $data['reviews'] = $this->M_menu_pelanggan->getReviews($id);
        $data['jmlreview'] = $this->M_menu_pelanggan->countReviewsByItem($id);
       

        $this->load->library('cart');

        $data['selected_menu'] = 'hero-normal';
        $data['isWeddingOrganizer'] = true;
        $data['active'] = 'jasa';
        $data['title'] = ' Detail Jasa ';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);

        $this->load->view('Pelanggan/Jasa/Detail_jasa_beranda', $data);
        $this->load->view('Pelanggan/layout/footer');
    }
    public function rating()
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $id_produk = $this->input->post('id_produk');
        $rating = $this->input->post('rating');
        $ulasan = $this->input->post('ulasan');

        $datainput = array(
            'ID_customer' => $this->session->userdata('ID_customer'),
            'ID_produk' => $id_produk,
            'Rating' => $rating,
            'Ulasan' => $ulasan,
        );
      
        $this->Madmin->insert('tbl_rating', $datainput);

        $this->session->set_flashdata('not', ' <div class="alert alert-primary alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
        Trimakasih atas ulasan dan rating anda.
      </div>');
        redirect('jasa_beranda/detail_jasa_produk/' . $id_produk);
    }

    public function filter_harga()
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }


        $min_price = $this->input->get('min_price');
        $max_price = $this->input->get('max_price');

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $data['filterproduk'] = $this->M_menu_pelanggan->get_data_by_price_range($min_price, $max_price);
        $data['total_data'] = $this->M_menu_pelanggan->count_data_by_price_range($min_price, $max_price);

        $this->load->library('cart');

       
        $data['isWeddingOrganizer'] = true;
        $data['selected_menu'] = 'hero-normal';
        $data['active'] = 'jasa';
        $data['title'] = 'Filter By Harga';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Jasa/Tampil_harga_filter', $data);
        $this->load->view('Pelanggan/layout/footer');
    }
    public function filter_tahun()
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }
        $filter_year = $this->input->get('filter_year');

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $data['produk_terbaru'] = $this->M_join_tabel->getProdukTerbaru();
        $data['produk'] = $this->M_join_tabel->join_jasa('tbl_produk');

        $data['produktahun'] = $this->M_menu_pelanggan->get_data_by_year($filter_year);

        $this->load->library('cart');

       
        $data['isWeddingOrganizer'] = true;
        $data['selected_menu'] = 'hero-normal';
        $data['active'] = 'jasa';
        $data['title'] = 'Filter By Tahun';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Jasa/Tampil_tahun_filter', $data);
        $this->load->view('Pelanggan/layout/footer');
    }
    public function addRating()
    {

        $user_id = $this->input->post('id_customer');
        $item_id = $this->input->post('id_produk');
        $rating = $this->input->post('Rating');

        // Simpan rating ke dalam database
        $this->M_menu_pelanggan->addRating($user_id, $item_id, $rating);

        // Redirect atau berikan respons sesuai kebutuhan
        redirect('item/detail/' . $item_id);
    }

    public function getAverageRating($item_id)
    {
        // Dapatkan dan kirimkan rata-rata rating ke view
        $data['average_rating'] = $this->M_menu_pelanggan->getAverageRating($item_id);
        $this->load->view('jasa_beranda', $data);
    }
}
