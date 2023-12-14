<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_wed extends CI_Controller
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

        $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();

        $data['semua_produk'] = $this->M_join_tabel->getProdukTerbaru();

        $data['produk'] = $this->Madmin->get_all_data('tbl_produk')->result();

        $data['cartItems'] = $this->cart->contents();

        $data['produkrek'] = $this->M_data->getAllProducts();
      
        // Proses data menggunakan tfdif
        $this->processDataWithCbrs($data['produkrek']);

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

    private function processDataWithCbrs($produkrek)
    {
        $data = [];
        foreach ($produkrek as $val) {
            $data[$val->ID_produk] = $this->pre_process($val->Nama_produk . ' ' . $val->Harga);
        }

        $this->Tfidf->create_index($data);
        $this->Tfidf->idf();
     
    }
    private function pre_process($str)
    {
        // Fungsi pre-processing seperti yang Anda lakukan sebelumnya
        return strtolower($str);
    }



    public function kategori($id)
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }
        $detail = $this->Madmin->detail_kategori($id);
        $data['detail'] = $detail;

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

     

        $data['produk_kategori'] = $this->M_join_tabel->getProdukByKategori($id);
        $data['produk_terbaru'] = $this->M_join_tabel->getProdukTerbaruByKategori($id);
        $data['produk_lama'] = $this->M_menu_pelanggan->getproduklama();

        $data['produk'] = $this->Madmin->get_all_data('tbl_produk')->result();

        $this->load->library('cart');

        $data['selected_menu'] = 'hero';
        $data['isWeddingOrganizer'] = false;
        $data['active'] = 'jasa';
        $data['title'] = 'Kategori Jasa';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Kategori_beranda/Tampil_kategori_beranda', $data);
        $this->load->view('Pelanggan/layout/footer');
    }



    public function registrasi()
    {

        $this->form_validation->set_rules('nama_lengkap', 'Nama_lengkap', 'required', array(
            'required' => 'Masukan Nama Lengkap anda.'
        ));
        $this->form_validation->set_rules('nomor_rekening', 'Nomor_rekening', 'required', array(
            'required' => 'Masukan Nomor Rekening Aktif anda.'
        ));
        $this->form_validation->set_rules('nomor_telfon', 'Nomor_telfon', 'required', array(
            'required' => 'Masukan Nomor Telfon anda.'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Masukan Email anda.'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => 'Masukan Alamat anda.'
        ));
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[5]|matches[konfirmasi]'
        );
        $this->form_validation->set_rules(
            'konfirmasi',
            'Konfirmasi',
            'required|trim|min_length[5]|matches[password]'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->library('cart');

            $data['selected_menu'] = 'hero';
            $data['isWeddingOrganizer'] = false;
            $data['active'] = 'home';
            $data['title'] = ' Registrasi';
            $this->load->view('Pelanggan/layout/header', $data);
            $this->load->view('Pelanggan/layout/menu', $data);
            $this->load->view('Pelanggan/Registrasi_pelanggan', $data);
            $this->load->view('Pelanggan/layout/footer');
        } else {
            $Nama_lengkap = $this->input->post('nama_lengkap');
            $Nomor_rekening =  $this->input->post('nomor_rekening');
            $Nomor_telfon = $this->input->post('nomor_telfon');
            $Email = $this->input->post('email');
            $Alamat = $this->input->post('alamat');
            $Password = $this->input->post('password');

            $config['upload_path'] = './assets/fotoprofil/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['ukuran_maks']              =  5000;
            $config['max_width']             =  2048;
            $config['max_height']            =  2048;


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data_file = $this->upload->data();
                $dataInput = array(
                    'Nama_lengkap' => $Nama_lengkap,
                    'Password' => $Password,
                    'Alamat' => $Alamat,
                    'Rekening' => $Nomor_rekening,
                    'Telfon' => $Nomor_telfon,
                    'Email' => $Email,
                    'Gambar' =>  $data_file['file_name'],
                    'Date_created' => date('Y-m-d H:i:s'),
                );

                $this->M_menu_pelanggan->insert('tbl_customer', $dataInput);

                $this->session->set_flashdata('not', ' <div class="alert alert-primary alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
                Registrasi Berhasil.Silahkan Login !!
              </div>');
                redirect('beranda_wed/login_pelanggan');
            } else {
                $this->session->set_flashdata('not', ' <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fa fa-check"></i><b> Gagal!</b></h6>
                Silahkan Cek Kembali Inputam Anda.
              </div>');
                redirect('beranda_wed/registrasi');
            }
        }
    }

    public function login_pelanggan()
    {

        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Masukan Email anda!'
        ));
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => 'Masukan Password anda!')
        );

        if ($this->form_validation->run() == FALSE) {

            $data['selected_menu'] = 'hero-normal';
            $data['isWeddingOrganizer'] = true;
            $data['active'] = 'home';
            $data['title'] = 'Login Customer';
            $this->load->view('Pelanggan/layout/header', $data);
            $this->load->view('Pelanggan/layout/menu', $data);
            $this->load->view('Pelanggan/Login', $data);
            $this->load->view('Pelanggan/layout/footer');
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $id_customer = $this->M_menu_pelanggan->getCustomerIdByEmail($email, $password);

            if ($id_customer) {
                // Set sesi dengan ID pelanggan
                $this->session->set_userdata('ID_customer', $id_customer);
                $this->session->set_userdata('emailCustomer', $email);
                $this->session->set_userdata('status', 'login');

                redirect('Beranda_wed');
            } else {
                // Validasi sukses, tetapi login gagal, tampilkan pesan error
                $this->session->set_flashdata('not', ' <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fa fa-ban"></i><b> Gagal!</b></h6>
                Email atau Password anda Salah.Silahkan Coba Lagi!
              </div>');
              
                $this->load->library('cart');
                $data['selected_menu'] = 'hero-normal';
                $data['isWeddingOrganizer'] = true;
                $data['title'] = 'Login Customer';
                $this->load->view('Pelanggan/layout/header', $data);
                $this->load->view('Pelanggan/layout/menu', $data);
                $this->load->view('Pelanggan/Login', $data);
                $this->load->view('Pelanggan/layout/footer');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('beranda_wed');
    }
}
