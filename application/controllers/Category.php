<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Category extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('category_model');
		}

		public function index()
		{
			$this->load->view('categories/cat_create');
		}

		public function create() 
		{
			// Judul Halaman
			$data['page_title'] = 'Buat Kategori Baru';

			// Kita butuh helper dan library berikut
			$this->load->helper('form');
			$this->load->library('form_validation');

			// Form validasi untuk Nama Kategori
			$this->form_validation->set_rules(
				'cat_name',
				'Nama Kategori',
				'required|is_unique[categories.cat_name]',
				array(
					'required' => 'Isi %s donk, males amat.',
					'is_unique' => 'Judul <strong>' . $this->input->post('cat_name') . '</strong> sudah ada bosque.'
				)
			);

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('categories/cat_create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->category_model->create_category();
				redirect('category');
			}
		}
	
	}
	
	/* End of file Category.php */
	/* Location: ./application/controllers/Category.php */