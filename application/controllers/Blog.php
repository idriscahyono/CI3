<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Blog extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('modelblog');
	}

	public function index()
	{ 
		//load model blog
		$data['daftar_artikel']=$this->modelblog->pilih_semua();

		$this->load->view('blog', $data);
	}

	public function read()
	{
		$id=$this->uri->segment(3);

		$data['artikel']=$this->modelblog->pilih_satu($id)->row_array();
		$this->load->view('detail', $data);
	
	}
}
	/* End of file Blog.php */
	/* Location: ./application/controllers/Blog.php */