<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class About extends CI_Controller {
	
		public function index()
		{
			$this->load->view('about');
		}

/*		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
		}*/
	
	}
	
	/* End of file About.php */
	/* Location: ./application/controllers/About.php */