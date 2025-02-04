<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penjualan_model', 'pm');
	}

	public function index()
	{
		$data['title'] = "Penjualan";

		// tampilkan data produk dari db
		$data['produk'] = $this->db->get('produk')->result_array();
		// tampilkan data keranjang dari db
		$data['keranjang'] = $this->db->get('keranjang')->result_array();

		// tampilkan view produk
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar');
        $this->load->view('penjualan/pilih-produk');
        $this->load->view('template/footer');
        $this->load->helper('url');

	}

	public function checkout()
	{
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

		if ($this->form_validation->run() == FALSE) {
			redirect('penjualan');
		} else {
			$this->pm->checkout();

			redirect('penjualan');  
		}
	}
}

/* End of file Penjualan.php and path \application\controllers\Penjualan.php */
