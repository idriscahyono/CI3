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
		$this->load->model('modelblog');
		//load model blog
		$data['artikel']=$this->modelblog->pilih_semua();

		$this->load->view('blog_view', $data);
	}

	public function read($slug='')
	{
		/*$id=$this->uri->segment(3);

		$data['artikel']=$this->modelblog->pilih_satu($id)->row_array();
		$this->load->view('detail', $data);*/
		$this->load->model('modelblog');

		$data['artikel'] = $this->modelblog->pilih_satu($id);

		if (empty($slug) || !isset($data['artikel']))show_404();
		$this->load->view('blog_read', $data);
	
	}

	public function lihat_detail($kategori, $id)
	{
		echo $kategori;
		echo '<br>';
		echo $id;
	}

	public function create()
	{
		$data['mode'] = 'Create';

		$this->load->model('modelblog');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Judul', 'required|is_unique[blog.title]',
			array(
				'required' 		=> 'Tolong Isi %s',
				'is_unique' 	=> 'Judul ' .$this->input->post('title'). ' sudah ada'
			));

		$this->form_validation->set_rules('text', 'Konten', 'required|min_length[8]',
			array(
				'required' 		=> 'Anda Belum Isi %s.',
				'min_length' 	=> 'Isian %s kurang panjang.',
			));

		 if ($this->form_validation->run() === FALSE) 
		 {
		 	$this->load->view('blog_create');
		 }
		 else
		 {
		 	if(is_string($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0)
		 	{
		 		$config['upload_path']          = './uploads/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 100;
    	        $config['max_width']            = 1024;
    	        $config['max_height']           = 768;

    	        // Load library upload
    	        $this->load->library('upload', $config);
		 	if (! $this->upload->do_upload('thumbnail'))
		 	{
		 		$data['upload_error'] = $this->upload->display_errors();

    	        	$post_image = '';

    	            $this->load->view('blog_create', $data);
		 	}
		 	else
		 	{
		 		$img_data = $this->upload->data();
    	        $post_image = $img_data['file_name'];
		 	}
		 }
		 else
		 {
		 	$post_image = '';
		 }
		 $this->load->helper('url');

	    	$slug = url_title($this->input->post('title'), 'dash', TRUE);

	    	$post_data = array(
	    	    'title' => $this->input->post('title'),
	    	   	'date' => date("Y-m-d H:i:s"),
	    	    /*'post_slug' => $slug,*/
	    	    'content' => $this->input->post('text'),
	    	    'image_file' => $post_image,
	    	   	'date' => date("Y-m-d H:i:s"),
	    	);
	    	if (empty($data['upload_error']))
	    	{

	    		$this->modelblog->tambah_artikel($post_data);
		        $this->load->view('blog_success', $data);
		    }
		}
	}

	public function edit($id)
	{
		$data['mode'] = 'Edit';
		$this->load->model('modelblog');

		$data['artikel'] = $this->modelblog->pilih_satu($id);

		if ( empty($id) || !$data['artikel'] ) show_404();

		$old_image = $data['artikel']->post_thumbnail;

		$this->load->helper('form');
	    $this->load->library('form_validation');

	    $this->form_validation->set_rules('title', 'Judul', 'required',
			array('required' => 'Tolong Isi %s.'));
	    $this->form_validation->set_rules('text', 'Konten', 'required');

	    if ($this->form_validation->run() === FALSE) 
	    {
	    	$this->load->view('blog_edit', $data);
	    }
	    else
	    {
	    	if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
	    	{
	    		$config['upload_path']          = './uploads/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 100;
    	        $config['max_width']            = 1024;
    	        $config['max_height']           = 768;

    	        $this->load->library('upload', $config);
    	        if (! $this->upload->do_upload('thumbnail'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();

    	        	$post_image = '';

    	        	$this->load->view('blog_edit', $data);
    	        }
    	        else
    	        {
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './uploads/'.$old_image ) ){
    	        		    unlink( './uploads/'.$old_image );
    	        		} else {
    	        		    echo 'File tidak ditemukan.';
    	        		}
    	        	}
    	        	$img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];

    	        }
	    	}
	    	else
	    	{
	    		$post_image = ( !empty($old_image) ) ? $old_image : '';
	    	}
	    	$post_data = array(
	    	    'title' => $this->input->post('title'),
	    	    'content' => $this->input->post('text'),
	    	    'image_file' => $post_image,
	    	);

	    	if( empty($data['upload_error']) ) {

		        $this->modelblog->update_artikel($post_data, $id);

		        $this->load->view('blog_success', $data);
	    	}
	    }
	}

	public function delete($id)
	{
		$data['mode'] = 'Hapus';

		$this->load->model('modelblog');

		$data['artikel'] = $this->modelblog->pilih_satu($id);

		if(empty($id) || !$data['artikel'])
			show_404();

		$old_image = $data['artikel']->post_thumbnail;

		if( !empty($old_image))
		{
			if ( file_exists( './uploads/'.$old_image ) ){
    		    unlink( './uploads/'.$old_image );
    		} else {
    		    echo 'File tidak ditemukan.';
    		}
		}

		if (! $this->modelblog->delete_artikel($id)) 
		{
			$this->load->view('blog_failed', $data);
		}
		else
		{
			$this->load->view('blog_success', $data);
		}
	}
}
	/* End of file Blog.php */
	/* Location: ./application/controllers/Blog.php */