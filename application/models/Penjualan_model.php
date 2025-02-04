<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    public function checkout()
    {
        $id     = $this->input->post('id');
        $harga  = $this->input->post('harga');
        $qty    = $this->input->post('jumlah');
        $sub    = $harga * $qty;

        $data = [
            'produkID'      => $id,
            'jumlahBeli'    => $qty,
            'Harga'         => $harga,
            'SubTotal'      => $sub
        ];

        // jalankan query insert tabel keranjang
        $this->db->insert('keranjang', $data);
    }
}


/* End of file Penjualan_model.php and path \application\models\Penjualan_model.php */
