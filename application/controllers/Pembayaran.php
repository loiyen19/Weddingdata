<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('M_join_tabel');
        $this->load->model('M_data');
        $this->load->library('form_validation');
    }

public function index(){
    if (empty($this->session->userdata('userName'))) {
        redirect('adminpanel');
    }
    $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
    $this->session->userdata('userName')])->row_array();

    $data['pembayaran'] = $this->M_join_tabel->pembayaran();


    $data['title'] = 'Pembayaran';
    $this->load->view('Admin/layout/header', $data);
    $this->load->view('Admin/layout/menu');
    $this->load->view('Admin/Pembayaran/Tampil_pembayaran', $data);
    $this->load->view('Admin/layout/footer');

}

}