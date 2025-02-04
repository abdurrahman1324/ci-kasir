<?php
class Produk_model extends CI_Model
{
 // tambah data produk
 public function insertProduk()
 {
  // inisiasi variabel untuk field produk
  $nama =$this->input->post('namaProduk');
  $harga =$this->input->post('harga');
  $stok =$this->input->post('stok');

  $data = [
    'namaProduk' => $nama,
    'harga'      => $harga,
    'stok'       => $stok,
  ];

  //eksekusi insert data produk
  $this->db->insert('produk', $data);
 } 
 
  public function getProdukById($id)
  {
      return $this->db->get_where('produk', ['produkID' => $id])->row_array();
  }

  public function updateProduk($id)
  {
      $data = [
          'namaProduk' => $this->input->post('namaProduk'),
          'harga' => $this->input->post('harga'),
          'stok' => $this->input->post('stok'),
      ];
      
      $this->db->where('produkID', $id);
      $this->db->update('produk', $data);
  }

}