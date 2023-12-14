<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_service extends CI_Controller
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
        $this->Tfidf = new Tfidf();
    }

    public function index()
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }
        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $data['selected_menu'] = 'hero';
        $data['isWeddingOrganizer'] = false;
        $data['active'] = 'cs';
        $data['title'] = ' Beranda';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/customer_servis/Tampil_cs_user', $data);
        $this->load->view('Pelanggan/layout/footer');
    }

    public function tambah()
    {
        $subjek = $this->input->post('subjek');
        $pesan = $this->input->post('pesan');
        $email = $this->input->post('email');

        $datainput = array(
            'ID_customer' => $this->session->userdata('ID_customer'),
            'Subjek' => $subjek,
            'Pesan' => $pesan,
            'Tanggal' => date('Y-m-d H:i:s'),
            'Email' => $email,
        );
        $this->Madmin->insert('tbl_hubungi', $datainput);
        $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
       <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
       Pesan Anda Berhasil Dikirim.untuk informasi selanjutnya akan kami kirimkan via Email
     </div>');

        redirect('customer_service');
    }
}
