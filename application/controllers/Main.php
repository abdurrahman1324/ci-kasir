<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function index ()
   {
      //panggil view
      $this->load->view('template/sidebar');
      $this->load->view('template/topbar');
      $this->load->view('template/content');
      $this->load->view('template/footer');
   }
}

