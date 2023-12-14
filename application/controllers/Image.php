<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Image extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('M_data');
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

        $data['produk'] = $this->Madmin->get_all_data('tbl_produk')->result();
        $data['foto'] = $this->M_join_tabel->join_image();

        $data['title'] = 'Foto Jasa';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Gambar/Tampil_gambar_produk', $data);
        $this->load->view('Admin/layout/footer');
    }

    public function upload_gambar()
    {
        $id_produk = $this->input->post('id_produk');

        $config['upload_path']   = './asset/gambar/';
        $config['allowed_types'] = 'gif|jpg|png';


        $this->load->library('upload', $config);

        // Mendapatkan jumlah file yang diupload
        $number_of_files = count($_FILES['gambar']['name']);

        // Konfigurasi untuk setiap file
        for ($i = 0; $i < $number_of_files; $i++) {
            $_FILES['userfile']['name']    = $_FILES['gambar']['name'][$i];
            $_FILES['userfile']['type']    = $_FILES['gambar']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
            $_FILES['userfile']['error']    = $_FILES['gambar']['error'][$i];
            $_FILES['userfile']['size']     = $_FILES['gambar']['size'][$i];

            $this->upload->initialize($config);

            // Proses upload
            if ($this->upload->do_upload('userfile')) {
                $data = $this->upload->data();
                $nama_file = $data['file_name'];


                $this->Madmin->insert_gambar([
                    'ID_produk' => $id_produk,
                    'Image' => $nama_file,
                    'Date_created' => date('Y-m-d H:i:s'),

                ]);
            } else {
                $this->session->set_flashdata('not', ' <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-ban"></i><b> Gagal!</b></h6>
                Silahkan Cek Kembali Inputan Anda !
              </div>');
                redirect('image');
            }
        }
        $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
        Tambah Jasa Berhasil
      </div>');
        redirect('image');
    }

    public function delete($ID_image)
    {
        $this->Madmin->delete('tbl_image', 'ID_image', $ID_image);

        redirect('image');
    }
}
