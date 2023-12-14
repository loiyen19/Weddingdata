<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating_beranda extends CI_Controller {

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

    public function addRating() {
        
        $user_id = $this->input->post('id_customer');
        $item_id = $this->input->post('id_produk');
        $rating = $this->input->post('Rating');

        // Simpan rating ke dalam database
        $this->M_menu_pelanggan->addRating($user_id, $item_id, $rating);

        // Redirect atau berikan respons sesuai kebutuhan
        redirect('item/detail/'.$item_id);
    }

    public function getAverageRating($item_id) {
        // Dapatkan dan kirimkan rata-rata rating ke view
        $data['average_rating'] = $this->M_menu_pelanggan->getAverageRating($item_id);
        $this->load->view('jasa_beranda', $data);
    }
}