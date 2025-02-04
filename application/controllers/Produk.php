<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // Muat library form validation
        $this->load->model('Produk_model', 'pm'); // Muat model Produk_model
    }

    public function index()
    {
        $data['title'] = "Produk";

        // Tampilkan data produk dari database
        $data['produk'] = $this->db->get('produk')->result_array();

        // Tampilkan view produk
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar');
        $this->load->view('produk/view-produk');
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Produk";

        // Buat form validation
        $this->form_validation->set_rules('namaProduk', 'namaProduk', 'required|min_length[3]');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'stok', 'required|integer');

        // Jika form submit, jalankan form validation
        if ($this->form_validation->run() == FALSE) {
            // Tampilkan form tambah produk
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('produk/add-produk');
            $this->load->view('template/footer');
        } else {
            // Jika form validation terpenuhi, input data
            $this->pm->insertProduk();

            // Redirect ke halaman produk
            redirect('produk');
        }
    }

        public function editProduk($id)
    {
        // Ambil data produk berdasarkan ID
        $data['produk'] = $this->pm->getProdukById($id);
        $data['title'] = "Edit Produk";

        // Buat form validation
        $this->form_validation->set_rules('namaProduk', 'namaProduk', 'required|min_length[3]');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'stok', 'required|integer');

        // Jika form submit, jalankan form validation
        if ($this->form_validation->run() == FALSE) {
            // Tampilkan form edit produk
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('produk/edit-produk', $data);  // Pastikan menggunakan data produk
            $this->load->view('template/footer');
        } else {
            // Jika form validation terpenuhi, update data produk
            $this->pm->updateProduk($id);

            // Redirect ke halaman produk
            redirect('produk');
        }
    }

    public function deleteProduk($id)
    {
        $this->db->delete('produk', ['produkID' => $id]);
        redirect('produk');
    }
}