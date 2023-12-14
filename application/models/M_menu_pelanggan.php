<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_menu_pelanggan extends CI_Model
{

    public function getCustomerIdByEmail($email,$password)
    {
      
        $this->db->select('ID_customer');
        $this->db->from('tbl_customer');
        $this->db->where('Email', $email);
        $this->db->where('Password', $password);

        $query = $this->db->get();

        // Jika ditemukan satu baris, kembalikan ID pelanggan
        if ($query->num_rows() == 1) {
            $result = $query->row();
            return $result->ID_customer;
        }

        // Jika tidak ditemukan, kembalikan null atau nilai yang sesuai
        return null;
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('ID_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function foto($id = null)
    {
        $this->db->select('*');
        $this->db->where('ID_produk', $id);
        $query = $this->db->get('tbl_image');
        return $query->result();
    }

    public function getTopOrderedProducts() {
        $this->db->select('p.ID_produk, p.Nama_produk, p.Gambar, COUNT(od.ID_orders) as total_orders');
        $this->db->from('tbl_produk p');
        $this->db->join('tbl_order_item od', 'p.ID_produk = od.ID_produk');
        $this->db->group_by('p.ID_produk, p.Nama_produk, p.Gambar');
        $this->db->order_by('total_orders', 'DESC');
        $this->db->limit(10);
    
        $query = $this->db->get();
        return $query->result();
    }

    public function getProdukTerbaru($limit = 10)
    {
        $this->db->select('ID_produk, Nama_produk, Harga, Tgl_masuk,Gambar');
        $this->db->from('tbl_produk');
        $this->db->order_by('Tgl_masuk', 'DESC');
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
    
        $query = $this->db->get();
        return $query->result();
    }
    public function getNewestProducts($limit = 10) {
        $this->db->select('ID_produk, Nama_produk, Harga, Tgl_masuk,Gambar');
        $this->db->from('tbl_produk');
        $this->db->order_by('Tgl_masuk', 'DESC');
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
    
        $query = $this->db->get();
        return $query->result();
    }
    public function getproduklama($limit = 10) {
        $this->db->select('ID_produk, Nama_produk, Harga, Tgl_masuk,Gambar');
        $this->db->from('tbl_produk');
        $this->db->order_by('Tgl_masuk', 'ASC');
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
    
        $query = $this->db->get();
        return $query->result();
    }
    public function get_produk($id)
    {
        $this->db->where('ID_produk', $id);
        return $this->db->get('tbl_produk')->row_array();
    }

    public function get_data_by_price_range($min_price, $max_price)
    {
        $this->db->select('*');
        $this->db->where('Harga >=', $min_price);
        $this->db->where('Harga <=', $max_price);
        $query = $this->db->get('tbl_produk');

        return $query->result();
    }
    public function count_data_by_price_range($min_price, $max_price)
    {
        $this->db->where('Harga >=', $min_price);
        $this->db->where('Harga <=', $max_price);
        $query = $this->db->get('tbl_produk');
        return $query->num_rows();
    }
    public function get_data_by_year($filter_year)
    {

        $this->db->where('YEAR(Date_created) =', $filter_year); // Sesuaikan dengan nama kolom tanggal di tabel Anda
        $query = $this->db->get('tbl_produk');
        return $query->result();
    }

    public function countTotalRows()
    {
        return $this->db->count_all('tbl_produk');
    }

    public function get_data($limit, $offset)
    {
        $this->db->select('*');
        $this->db->join('tbl_kategori', 'tbl_kategori.ID_kategori = tbl_produk.ID_kategori', 'left');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('tbl_produk');
        return $query->result();
    }


    public function add_to_temp_order($data)
    {
        $this->db->insert('tbl_order_temp', $data);
        return $this->db->insert_id();
    }

    public function create_order($order_data)
    {
        $this->db->insert('tbl_orders', $order_data);
        return $this->db->insert_id();
    }

    public function add_order_item($order_item_data)
    {
        $this->db->insert('order_items', $order_item_data);
    }
    public function getOrdersByCustomerId() {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('ID_customer', $this->session->userdata('ID_customer'));
        $this->db->order_by('ID_order','desc');
       return $this->db->get()->result();
    }

    public function getUnpaidOrders() {
        // Ambil pesanan yang belum dibayar
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('Date_created IS NULL', null, false);
        return $this->db->get()->result();
    }

    public function markOrderAsExpired($order_id) {
        // Tandai pesanan sebagai hangus
        $this->db->where('ID_order', $order_id);
        $this->db->update('tbl_order', ['status' => 'expired']);
    }
    public function deleteUnpaidOrders() {
        $now = date('Y-m-d H:i:s');
        $oneMinuteAgo = date('Y-m-d H:i:s', strtotime('-24 hours', strtotime($now)));

        $this->db->where('Date_created <=', $oneMinuteAgo);
        $this->db->delete('tbl_order');

        return $this->db->affected_rows();
    }

    public function getPaymentDeadline($id) {
        $this->db->select('Date_created');
        $this->db->from('tbl_order');
        $this->db->where('ID_order', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->Date_created;
        }

        return null;
    }


    

    public function getAverageRating($id) {
        $this->db->select_avg('Rating', 'average_rating');
        $this->db->where('ID_produk', $id);
        $query = $this->db->get('tbl_rating');
        $result = $query->row();
        return $result->average_rating;
    }
 
    public function getReviews($item_id) {
        $this->db->select('*');
        $this->db->where('ID_produk', $item_id);
        $this->db->join('tbl_customer', 'tbl_customer.ID_customer = tbl_rating.ID_customer', 'left');
        $query = $this->db->get('tbl_rating');
        return $query->result();
    }

    public function countReviewsByItem($item_id) {
        $this->db->where('ID_produk', $item_id);
        return $this->db->count_all_results('tbl_rating');
    }

    public function ubahStatusPembayaran($id, $status) {
        $data = array('Status' => $status);
        $this->db->where('ID_order', $id);
        $this->db->update('tbl_order', $data);
    }
    

    //PENCARIAN
    public function cariData($keyword) {
        $this->db->like('Nama_produk', $keyword); // Gantilah 'nama_kolom' dengan nama kolom yang ingin Anda cari
        $query = $this->db->get('tbl_produk'); // Gantilah 'nama_tabel' dengan nama tabel yang ingin Anda cari
        return $query->result();
    }
}
