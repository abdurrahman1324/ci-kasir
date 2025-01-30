<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
 {

    public function index(){
        $data['title'] = "produk";

        //tampilakan data produk dari db
        $data['produk'] =$this->db->get('produk')->result_array();

        //tampil view produk
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar');
        $this->load->view('produk/view-produk');
        $this->load->view('template/footer');
    }

   public function tambah()
   {
    $data['title'] = "Tambah Produk";

    //tampilkan from tambah produk
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar');
    $this->load->view('produk/add-produk');
    $this->load->view('template/footer');
   }
}