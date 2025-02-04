<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // Muat library form validation
        $this->load->model('Pelanggan_model', 'pm'); // Muat model Pelanggan_model
    }

    public function index()
    {
        $data['title'] = "Pelanggan";

        // Tampilkan data pelanggan dari database
        $data['pelanggan'] = $this->db->get('pelanggan')->result_array();

        // Tampilkan view pelanggan
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar');
        $this->load->view('pelanggan/view-pelanggan');
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Pelanggan";

        // Buat form validation
        $this->form_validation->set_rules('namapelanggan', 'Nama Pelanggan', 'required|min_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomortelpon', 'Nomor Telpon', 'required');        
        
        // Jika form submit, jalankan form validation
        if ($this->form_validation->run() == FALSE) {
            // Tampilkan form tambah pelanggan
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('pelanggan/add-pelanggan');
            $this->load->view('template/footer');
        } else {
            // Jika form validation terpenuhi, input data
            $this->pm->insertPelanggan();

            // Redirect ke halaman pelanggan
            redirect('pelanggan');
        }
    }

        public function editPelanggan($id)
    {
        // Ambil data pelanggan berdasarkan ID
        $data['pelanggan'] = $this->pm->getPelangganById($id);
        $data['title'] = "Edit Pelanggan";

        // Buat form validation
        $this->form_validation->set_rules('namapelanggan', 'namapelanggan', 'required|min_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomortelpon', 'Nomor Telpon', 'required');        

        // Jika form submit, jalankan form validation
        if ($this->form_validation->run() == FALSE) {
            // Tampilkan form edit pelanggan
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar');
            $this->load->view('pelanggan/edit-pelanggan', $data);  // Pastikan menggunakan data pelanggan
            $this->load->view('template/footer');
        } else {
            // Jika form validation terpenuhi, update data pelanggan
            $this->pm->updatePelanggan($id);

            // Redirect ke halaman pelanggan
            redirect('pelanggan');
        }
    }

    public function deletePelanggan($id)
    {
        $this->db->delete('pelanggan', ['PelangganID' => $id]);
        redirect('pelanggan');
    }
}