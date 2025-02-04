<?php
class Pelanggan_model extends CI_Model
{
    // tambah data pelanggan
    public function insertPelanggan()
    {
    // inisiasi variabel untuk field pelanggan
    $namapelanggan  =$this->input->post('namapelanggan');
    $alamat         =$this->input->post('alamat');
    $nomortelpon    =$this->input->post('nomortelpon');
    $data = [
        'namapelanggan' => $namapelanggan,
        'alamat'        => $alamat,
        'nomortelpon'   => $nomortelpon,
    ];

    //eksekusi insert data pelanggan
    $this->db->insert('pelanggan', $data);
    } 
    
    public function getPelangganById($id)
    {
        return $this->db->get_where('pelanggan', ['pelangganID' => $id])->row_array();
    }

    public function updatePelanggan($id)
    {
        $data = [
            'namapelanggan' => $this->input->post('namapelanggan'),
            'alamat' => $this->input->post('alamat'),
            'nomortelpon' => $this->input->post('nomortelpon'),
        ];
        
        $this->db->where('pelangganID', $id);
        $this->db->update('pelanggan', $data);
    }

    public function deletePelanggan($id)
    {
        $this->db->delete('pelanggan', ['pelangganID' => $id]);
    }


}