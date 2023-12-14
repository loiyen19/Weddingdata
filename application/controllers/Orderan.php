<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orderan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('M_join_tabel');
        $this->load->model('M_data');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $data['orderan'] = $this->M_join_tabel->getorderan();


        $data['title'] = 'Orderan';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Orderan/Tampil_orderan_admin', $data);
        $this->load->view('Admin/layout/footer');
    }

    public function detail_orderan($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();


        $detail = $this->Madmin->detail_orders($id);
        $data['detail'] = $detail;


        //$data['order_temp'] = $this->M_join_tabel->join_order_temp('tbl_order_temp');
        $data['rincian'] = $this->M_join_tabel->nota_pembelian();


        $data['title'] = 'Detail Orderan';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Orderan/Detail_Orderan', $data);
        $this->load->view('Admin/layout/footer');
    }

    public function cekout()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $data['order_temp'] = $this->M_join_tabel->join_order_temp();

        $data['title'] = 'Cek Out';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Orderan/Tampil_produk_pembelian', $data);
        $this->load->view('Admin/layout/footer');
    }

    public function ubah_status($id){
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $this->Madmin->ubahStatus($id, 'selesai');
        redirect('orderan/cekout/'.$iD_order_item);


    }

    public function nota_pembelian($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $data['rincian'] = $this->Madmin->getOrderItemDetailsByOrderId($id);
        $data['customer'] = $this->Madmin->getCustomerByOrderId($id);
        $data['bayar'] = $this->Madmin->getCustomerBayar($id);

        $data['title'] = 'Nota Check Out';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Orderan/Detail_nota_pembelian', $data);
        $this->load->view('Admin/layout/footer');
    }

}
