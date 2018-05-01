<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Contact extends CI_Controller {
	
		public function index()
		{
			$data = array(
				'nama' => "Idris Cahyono",
				'alamat' => "Madiun",
				'email' => "Idriscahyono@gmail.com",
				'nim' => "1641720184",
				 );
			$this->load->view('templates/header');
			$this->load->view('contact', $data);
			$this->load->view('templates/footer');
		}

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}
	
	}
	
	/* End of file Contact.php */
	/* Location: ./application/controllers/Contact.php */