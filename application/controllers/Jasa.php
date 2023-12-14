<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jasa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('M_join_tabel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $data['jasa'] = $this->M_join_tabel->join_jasa('tbl_produk');
        $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required', array(
            'required' => 'Masukan kategori Produk anda.'
        ));
        $this->form_validation->set_rules('nama_produk', 'Nama produk', 'required', array(
            'required' => 'Masukan Nama Produk Produk anda.'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => 'Masukan Deskripsi Produk anda.'
        ));
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', array(
            'required' => 'Masukan Harga Produk anda.'
        ));
        $this->form_validation->set_rules('stok', 'Stok', 'required|integer', array(
            'required' => 'Masukan Stok Produk anda.'
        ));
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal', 'required', array(
            'required' => 'Masukan Tanggal Produk anda.'
        ));
        $this->form_validation->set_rules('diskon', 'Diskon', 'required|integer', array(
            'required' => 'Masukan Diskon Produk anda.'
        ));


        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Jasa';
            $this->load->view('Admin/layout/header', $data);
            $this->load->view('Admin/layout/menu');
            $this->load->view('Admin/Jasa/Tampil_jasa_admin', $data);
            $this->load->view('Admin/layout/footer');
        } else {

            $Kategori = $this->input->post('kategori');
            $Nama_produk = $this->input->post('nama_produk');
            $Deskripsi = $this->input->post('deskripsi');
            $Harga = $this->input->post('harga');
            $Tanggal_masuk = $this->input->post('tanggal_masuk');
            $Stok = $this->input->post('stok');
            $Diskon = $this->input->post('diskon');

            $config['upload_path'] = './asset/gambar/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['ukuran_maks']              =  5000;
            $config['max_width']             =  2048;
            $config['max_height']            =  2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data_file = $this->upload->data();
                $dataInput = array(
                    'ID_kategori' => $Kategori,
                    'Nama_produk' => $Nama_produk,
                    'Deskripsi' => $Deskripsi,
                    'Harga' => $Harga,
                    'Tgl_masuk' => $Tanggal_masuk,
                    'Stok' => $Stok,
                    'Diskon' => $Diskon,
                    'Gambar' =>  $data_file['file_name'],
                    'Date_created' => date('Y-m-d H:i:s')
                );
                $this->Madmin->insert('tbl_produk', $dataInput);

                $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
                Tambah Jasa Berhasil
              </div>');
                redirect('jasa');
            } else {

                $this->session->set_flashdata('not', ' <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-ban"></i><b> Gagal!</b></h6>
                Silahkan Cek Kembali Inputan Anda !
              </div>');
                redirect('jasa');
            }
        }
    }
    public function detail_jasa($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();


        $detail = $this->Madmin->detail_data($id);
        $data['detail'] = $detail;
        $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();


        $data['title'] = 'Detail Jasa';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Jasa/Detail_jasa_admin', $data);
        $this->load->view('Admin/layout/footer');
    }

    public function Edit_jasa($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $data['produk'] = $this->Madmin->get_by_id('tbl_produk', array('ID_produk' => $id))->row();
        $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();


        $this->form_validation->set_rules('kategori', 'Kategori', 'required', array(
            'required' => 'Masukan kategori Produk anda.'
        ));
        $this->form_validation->set_rules('nama_produk', 'Nama produk', 'required', array(
            'required' => 'Masukan Nama Produk Produk anda.'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => 'Masukan Deskripsi Produk anda.'
        ));
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', array(
            'required' => 'Masukan Harga Produk anda.'
        ));
        $this->form_validation->set_rules('stok', 'Stok', 'required|integer', array(
            'required' => 'Masukan Stok Produk anda.'
        ));
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal', 'required', array(
            'required' => 'Masukan Tanggal Produk anda.'
        ));
        $this->form_validation->set_rules('diskon', 'Diskon', 'required|integer', array(
            'required' => 'Masukan Diskon Produk anda.'
        ));


        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Edit Jasa';
            $this->load->view('Admin/layout/header', $data);
            $this->load->view('Admin/layout/menu');
            $this->load->view('Admin/Jasa/Edit_jasa_admin', $data);
            $this->load->view('Admin/layout/footer');
        } else {
            $data['produk'] = $this->Madmin->get_by_id('tbl_produk', array('ID_produk' => $id))->row();
            $gambar = $data['produk']->Gambar;

            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './asset/gambar/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['ukuran_maks']              =  5000;
                $config['max_width']             =  2048;
                $config['max_height']            =  2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $data_file = $this->upload->data();
                    $gambar = $data_file['file_name'];
                } else {
                    redirect('jasa/Edit_jasa' . $ID_produk, 'refresh');
                }
            }

            $Kategori = $this->input->post('kategori');
            $Nama_produk = $this->input->post('nama_produk');
            $Deskripsi = $this->input->post('deskripsi');
            $Harga = $this->input->post('harga');
            $Tanggal_masuk = $this->input->post('tanggal_masuk');
            $Stok = $this->input->post('stok');
            $Diskon = $this->input->post('diskon');

            $data_update = array(
                'ID_kategori' => $Kategori,
                'Nama_produk' => $Nama_produk,
                'Deskripsi' => $Deskripsi,
                'Harga' => $Harga,
                'Tgl_masuk' => $Tanggal_masuk,
                'Stok' => $Stok,
                'Diskon' => $Diskon,
                'Gambar' =>  $gambar,
                'Date_created' => date('Y-m-d H:i:s')
            );
            $this->Madmin->update('tbl_produk', $data_update, 'ID_produk', $id);

            $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
                Edit Jasa Berhasil
              </div>');
            redirect('jasa');
        }
    }


    public function Hapus_jasa($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $this->Madmin->delete('tbl_produk', 'ID_produk', $id);
        
        $this->session->set_flashdata('not', ' <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
       Data Berhasil dihapus!
      </div>');
        redirect('jasa');
    }
}
