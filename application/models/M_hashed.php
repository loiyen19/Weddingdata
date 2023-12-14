<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hashed extends CI_Model {

	public function hash_string($string)
	{
		//fungsi untuk mengecek kode 
		//kode yang dimasukan diubang menjadi string dan cost/nilainya harus lebih dari 9
		$hashed_string = password_hash($string, PASSWORD_BCRYPT, ['cost'=>9]);
		return $hashed_string;
	}

	public function hash_verify($plain_text, $hashed_string)
	{
		//fungsi untuk veriviksi pasword
		//dimana hash_string akan diverify oleh plain_text
		$hashed_string = password_verify($plain_text, $hashed_string);
		return $hashed_string;
	}

	public function deskrip($string){
		$this->load->library('encryption');
		$desk=$this->encryption->decrypt('$string');
		return $desk;
	}

}

/* End of file m_hashed.php */
/* Location: ./application/models/m_hashed.php */