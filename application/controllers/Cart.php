<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('M_menu_pelanggan');
        $this->load->library('cart');
        $this->load->model('M_join_tabel');
        $this->load->library('form_validation');

    }
    public function index()
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $data['cartItems'] = $this->cart->contents();

        $data['selected_menu'] = 'hero-normal';
        $data['isWeddingOrganizer'] = true;
        $data['active'] = 'jasa';
        $data['title'] = ' Keranjang Belanja';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Keranjang_belanja/Tampil_keranjang', $data);
        $this->load->view('Pelanggan/layout/footer');
    }
    public function add_keranjang($id)
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $dataWhere = array('ID_produk' => $id);
        $produk = $this->Madmin->get_by_id('tbl_produk', $dataWhere)->row_object();


        $data = array(
            'id'    => $produk->ID_produk,
            'qty'    => 1,
            'price'    => $produk->Harga * $produk->Diskon / 100,
            'name'    => $produk->Nama_produk,
            'diskon'    => $produk->Diskon,

        );
        $this->cart->insert($data);

        redirect('cart');
    }

    public function update_cart()
    {
        // Update keranjang belanja
        $cart_data = array(
            'rowid'   => $this->input->post('rowid'),
            'qty'     => $this->input->post('qty')
        );

        $this->cart->update($cart_data);

        // Redirect kembali ke halaman keranjang belanja
        redirect('cart');
    }
    public function remove_from_cart($rowid)
    {
        // Hapus produk dari keranjang belanja berdasarkan row ID
        $this->cart->remove($rowid);

        // Redirect kembali ke halaman keranjang belanja
        redirect('cart');
    }

    public function checkout()
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $data['cartItems'] = $this->cart->contents();

        $this->form_validation->set_rules('tanggal_acara', 'Tanggal_acara', 'required', array(
            'required' => 'Masukan Tanggal Order Anda!'
        ));
        $this->form_validation->set_rules('jam_order', 'jam_order', 'required', array(
            'required' => 'Masukan Jam Order Anda!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => 'Masukan Jam Order Anda!'
        ));
        $this->form_validation->set_rules('cek', 'cek', 'required', array(
            'required' => 'Harap Centang Untuk Melanjutkan!'
        ));


        if ($this->form_validation->run() === FALSE) {
            
            $data['selected_menu'] = 'hero-normal';
            $data['isWeddingOrganizer'] = true;
            $data['active'] = 'order';
            $data['title'] = 'Detail Pemesanan';
            $this->load->view('Pelanggan/layout/header', $data);
            $this->load->view('Pelanggan/layout/menu', $data);
            $this->load->view('Pelanggan/Keranjang_belanja/Tampil_cekout', $data);
            $this->load->view('Pelanggan/layout/footer');
        } else {
            // Ambil data dari keranjang belanja
            $cartData = $this->cart->contents();
            $idcustomer = $this->input->post('ID_customer');
            $tanggal_order = $this->input->post('tanggal_acara');
            $jam_acara = $this->input->post('jam_order');
            $alamat = $this->input->post('alamat');
            $catatan = $this->input->post('catatan');
            $cek = $this->input->post('cek');


            // Simpan data ke dalam tabel order (contoh sederhana)
            $orderData = [
                'ID_customer' => $idcustomer, // sesuaikan dengan data user yang sedang login
                'Total' => $this->cart->total(),
                'Date_created' => date('Y-m-d H:i:s'),
                'Status' => 'Belum DiBayar'
            ];

            // Simpan data order ke dalam tabel order di database
            $this->db->insert('tbl_order', $orderData);
            $order_id = $this->db->insert_id();

            // Simpan detail item order ke dalam tabel order_items di database
            foreach ($cartData as $item) {
                $orderItemData = [
                    'ID_orders' => $order_id,
                    'ID_produk' => $item['id'],
                    'Quantity' => $item['qty'],
                    'price' => $item['price'],
                    'Tgl_order' => $tanggal_order,
                    'Jam_order' => $jam_acara,
                    'Alamat' => $alamat,
                    'Catatan' => $catatan,
                    'Chek_box' => $cek,
                    'Status' => 'Sedang diProses'
                ];
                $this->db->insert('tbl_order_item', $orderItemData);
            }
            // Kosongkan keranjang belanja setelah order diproses
            $this->cart->destroy();

            $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
        Pesanan Anda Berhasil Diproses.Harap Segera Melakukan Pembayaran!
      </div>');

            redirect('order_beranda');
        }
    }

    public function processOrder()
    {
        // Ambil data dari keranjang belanja
        $cartData = $this->cart->contents();

        // Simpan data ke dalam tabel order (contoh sederhana)
        $orderData = [
            'ID_customer' => $this->session->userdata('ID_customer'), // sesuaikan dengan data user yang sedang login
            'Total' => $this->cart->total(),
            'Date_created' => date('Y-m-d H:i:s')
        ];

        // Simpan data order ke dalam tabel order di database
        $this->db->insert('tbl_order', $orderData);
        $order_id = $this->db->insert_id();

        // Simpan detail item order ke dalam tabel order_items di database
        foreach ($cartData as $item) {
            $orderItemData = [
                'ID_orders' => $order_id,
                'ID_produk' => $item['id'],
                'Quantity' => $item['qty'],
                'price' => $item['price']
            ];

            $this->db->insert('tbl_order_items', $orderItemData);
        }

        // Kosongkan keranjang belanja setelah order diproses
        $this->cart->destroy();


        redirect('cart');
    }
}
