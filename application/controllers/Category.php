<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');

		// Load custom helper applications/helpers/MY_helper.php
		$this->load->helper('MY');

		// Load semua model yang kita pakai
		$this->load->model('blog_model');
		$this->load->model('category_model');
	}

	public function index() 
	{

		// Judul Halaman
		$data['page_title'] = 'List Kategori';

		// load semua kategori
		$data['categories'] = $this->category_model->get_all_categories();

		$this->load->view('templates/header');
		$this->load->view('categories/cat_view', $data);
		$this->load->view('templates/footer');
	}

	public function create() 
	{
		// Judul Halaman
		$data['page_title'] = 'Buat Kategori Baru';

		$this->load->helper('form');
		$this->load->library('form_validation');

		// Form validasi Nama Kategori
		$this->form_validation->set_rules(
			'cat_name',
			'Nama Kategori',
			'required|is_unique[categories.cat_name]',
			array(
				'required' => 'Isi %s Untuk Melanjutkan.',
				'is_unique' => 'Judul <strong>' . $this->input->post('cat_name') . '</strong> Data Sudah Ada.'
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

	// Menampilkan semua artikel dalam kategori yang dipilih
	public function artikel($id) 
	{

		// judul berdasar nama kategorinya
		$data['page_title'] = $this->category_model->get_category_by_id($id)->cat_name;

		// Dapatkan semua artikel dalam kategori
		$data['all_artikel'] = $this->blog_model->get_artikel_by_category($id);

		// Kita gunakan view yang sama pada controller Blog
		$this->load->view('templates/header');
		$this->load->view('blogs/blog_view', $data);
		$this->load->view('templates/footer');
	}

	// Membuat fungsi edit
	public function edit($id = NULL)
	{

		$data['page_title'] = 'Edit Kategori';

		// Get artikel dari model berdasarkan $id
		$data['category'] = $this->category_model->get_category_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman list category
		if ( empty($id) || !$data['category'] ) redirect('blog');

		// helper
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    // validasi input sederhana
		$this->form_validation->set_rules('cat_name', 'Nama Kategori', 'required',
			array('required' => 'Isi %s donk, males amat.'));
	    $this->form_validation->set_rules('cat_description', 'Deskripsi', 'required');

	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('templates/header');
	        $this->load->view('categories/cat_edit', $data);
	        $this->load->view('templates/footer');

	    } else {

	    	$post_data = array(
	    	    'cat_name' => $this->input->post('cat_name'),
	    	    'cat_description' => $this->input->post('cat_description'),
	    	);

		    $this->load->view('templates/header');
    		
    		// Update kategori sesuai post_data dan id-nya
	        if ($this->category_model->update_category($post_data, $id)) {
		        $this->load->view('blogs/blog_success', $data);
	        } else {
		        $this->load->view('blogs/blog_failed', $data);
	        }
	        $this->load->view('templates/footer'); 

	    }
	}


	public function delete($id)
	{

		$data['page_title'] = 'Delete category';

		$this->category_model->delete_category($id);

		$this->load->view('templates/header');
		$this->load->view('blogs/blog_success', $data);
		$this->load->view('templates/footer'); 

	}
}
