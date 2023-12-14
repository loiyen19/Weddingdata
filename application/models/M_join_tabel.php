<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_join_tabel extends CI_Model
{
    //join
    public function join_customer()
    {
        $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->join('tbl_customer', 'tbl_customer.ID_customer = tbl_orders.ID_customer', 'left');
        return $this->db->get()->result();
    }
    public function join_jasa()
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_kategori', 'tbl_kategori.ID_kategori = tbl_produk.ID_kategori', 'left');
        return $this->db->get()->result();
    }
    public function join_image()
    {
        $this->db->select('*');
        $this->db->from('tbl_image');
        $this->db->join('tbl_produk', 'tbl_produk.ID_produk = tbl_image.ID_produk', 'left');
        return $this->db->get()->result();
    }
    public function join_order()
    {
        $this->db->select('*');
        $this->db->from('tbl_orders');
        $this->db->join('tbl_customer', 'tbl_customer.ID_customer = tbl_orders.ID_customer', 'left');
        return $this->db->get()->result();
    }
    public function join_order_temp()
    {
        $this->db->select('*');
        $this->db->from('tbl_order_item');
        $this->db->join('tbl_produk', 'tbl_produk.ID_produk = tbl_order_item.ID_produk', 'left');
        return $this->db->get()->result();
    }
    public function join_order_item()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        return $this->db->get()->result();
    }
    public function detail_order()
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->join('tbl_customer', 'tbl_customer.ID_customer = tbl_order.ID_customer', 'left');
        return $this->db->get()->result();
         return $query->result();
    }
    public function pembayaran()
    {
        $this->db->select('*');
        $this->db->from('tbl_bayar');
        $this->db->join('tbl_order', 'tbl_order.ID_order = tbl_bayar.ID_order', 'left');
        return $this->db->get()->result();
         return $query->result();
    }
  
    public function getorderan(){

        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->join('tbl_customer', 'tbl_customer.ID_customer = tbl_order.ID_customer', 'left');
        return $this->db->get()->result(); 
    }
    
    public function getProdukByKategori($id) {
        $this->db->where('ID_kategori', $id);
        $query = $this->db->get('tbl_produk');
        return $query->result();
    }
    public function getProdukTerbaruByKategori($id) {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->where('ID_kategori', $id);
        
        $this->db->order_by('RAND()');
        $this->db->limit(10); // Ambil 10 produk terbaru, sesuaikan dengan kebutuhan
        $query = $this->db->get();
        return $query->result();
    }
    public function getProdukTerbaru() {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->order_by('Tgl_masuk', 'DESC'); // Mengurutkan berdasarkan tanggal secara menurun
        $this->db->limit(10); // Ambil 10 produk terbaru, sesuaikan dengan kebutuhan
        $query = $this->db->get();
        return $query->result();
    }
    public function getProducts() {
        // Query untuk mendapatkan produk dari database
        $query = $this->db->query('SELECT ID_produk, Nama_produk, Deskripsi FROM tbl_produk');
        return $query->result();
    }
    public function proses($customer_id) {
        $this->db->select('tbl_order_item.*, tbl_produk.Nama_produk,tbl_order.Total');
        $this->db->from('tbl_order_item');
        $this->db->join('tbl_produk', 'tbl_order_item.ID_produk = tbl_produk.ID_produk');
        $this->db->join('tbl_order', 'tbl_order_item.ID_orders = tbl_order.ID_order');
        $this->db->where('tbl_order.ID_customer', $customer_id);
        $this->db->where('tbl_order.Status', 'Sudah Dibayar');
        $query = $this->db->get();
        return $query->result();
    }
    public function selesai($customer_id) {
        $this->db->select('tbl_order_item.*, tbl_produk.Nama_produk,tbl_order.Total');
        $this->db->from('tbl_order_item');
        $this->db->join('tbl_produk', 'tbl_order_item.ID_produk = tbl_produk.ID_produk');
        $this->db->join('tbl_order', 'tbl_order_item.ID_orders = tbl_order.ID_order');
        $this->db->where('tbl_order.ID_customer', $customer_id);
        $this->db->where('tbl_order_item.Status', 'selesai');
        $query = $this->db->get();
        return $query->result();
    }


}
