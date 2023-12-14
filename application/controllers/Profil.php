<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->model('Madmin');
		$this->load->library('form_validation');
	 }


    public function index(){
        if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $data['title'] = 'Profil';
        $this->load->view('Admin/layout/header',$data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Profil/Tampil_profil_admin',$data);
        $this->load->view('Admin/layout/footer');    
    }
    public function edit_profil_admin()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required', array(
            'required' => 'Isikan Nama Baru lengkap anda! '
        ));
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Isikan Email Baru anda! '
        ));
        $this->form_validation->set_rules('no_telfon', 'Telfon', 'required', array(
            'required' => 'Isikan No Telfon Baru anda!'
        ));
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = ' Edit Profil';
            $this->load->view('Admin/layout/header',$data);
            $this->load->view('Admin/layout/menu');
            $this->load->view('Admin/Profil/form_edit_profil',$data);
            $this->load->view('Admin/layout/footer');    
        }else{

            $Nama_lengkap = $this->input->post('nama_lengkap');
            $Email = $this->input->post('email');
            $No_telfon = $this->input->post('no_telfon');

            $this->db->set('Nama_lengkap', $Nama_lengkap);
            $this->db->set('Email', $Email);
            $this->db->set('No_telp', $No_telfon);
            $this->db->where('username', $this->session->userdata('userName'));
            $this->db->update('tbl_admin');
            $this->session->set_flashdata('not', '<div class="alert alert-success" role="alert">
        Edit Profil Berhasil.
     </div>');
            redirect('profil');

        }   
    }
    public function ubah_password()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $this->form_validation->set_rules('password', 'Password', 'required|trim', array(
            'required' => 'Password tidak boleh kosong'
        ));
        $this->form_validation->set_rules(
            'password_baru',
            'Password Baru',
            'required|trim|min_length[5]|matches[konfirmasi]'
        );
        $this->form_validation->set_rules(
            'konfirmasi',
            'Konfirmasi',
            'required|trim|min_length[5]|matches[password_baru]'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/layout/header', $data);
            $this->load->view('Admin/layout/menu');
            $this->load->view('Admin/profil/Ubah_password_admin', $data);
            $this->load->view('Admin/layout/footer');
        } else {

            $id = $this->input->post('idAdmin');
            $Password = $this->input->post('password');
            $Password_baru = $this->input->post('password_baru');

            if (password_verify($Password, $data['user']['Password'])) {
                $this->session->set_flashdata('not', '<div class="alert alert-danger" role="alert">
                Password Tidak Sama.
             </div>');
                redirect('profil/Ubah_password');
            } else {
                if ($Password == $Password_baru) {
                    $this->session->set_flashdata('not', '<div class="alert alert-danger" role="alert">
                    Password baru dan lama tidak boleh sama.
                 </div>');
                    redirect('profil/Ubah_password');
                } else {
                    //password oke
                    $this->load->model('M_hashed');

                    $passwordx = $this->M_hashed->hash_string($Password_baru);
                    //maka data update arraynya pasword harus sama dengan passwordx
                     $dataUpdate = array('Password'=>$passwordx);
                          $this->Madmin->update('tbl_admin', $dataUpdate, 'ID_admin', $id);
                    $this->session->set_flashdata('not', '<div class="alert alert-success" role="alert">
                    Password Berhasil diubah
                 </div>');
                    redirect('profil');
                }
            }
        }
    }

}