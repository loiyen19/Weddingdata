<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('form_validation');
    }
    public function index()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();
        $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required', array(
            'required' => 'Masukan kategori Produk anda.'
        ));


        if ($this->form_validation->run() === FALSE) {
            $data['active'] = '';
            $data['title'] = 'Kategori';
            $this->load->view('Admin/layout/header', $data);
            $this->load->view('Admin/layout/menu');
            $this->load->view('Admin/Kategori/Tampil_kategori_admin', $data);
            $this->load->view('Admin/layout/footer');
        } else {
            $Kategori = $this->input->post('kategori');

            $dataInput = array('Kategori' => $Kategori);
            $this->Madmin->insert('tbl_kategori', $dataInput);

            $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
            Tambah Kategori Berhasil
          </div>');
            redirect('kategori');
        }
    }

    public function hapus($id){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }
        $this->Madmin->delete('tbl_kategori', 'ID_kategori', $id);
        redirect('kategori');
    }
}
