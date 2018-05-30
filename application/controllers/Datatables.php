<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Datatables extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}
		public function index()
		{
			$this->load->model('blog_model');
			$blog['data'] = $this->blog_model->get_all_artikel();

			$this->load->view('templates/header');
			$this->load->view('datatables/view', $blog);
			$this->load->view('templates/footer');
		}
	
	}
	
	/* End of file Datatables.php */
	/* Location: ./application/controllers/Datatables.php */