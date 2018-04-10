<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Crud extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('data');
		}

		public function index()
		{
			$data['blog'] = $this->data->view();
			$this->load->view('crud', $data);
		}

		public function tambah()
		{
			if($this->input->post('submit'))
			{
				if($this->data->validation("save"))
				{
					$this->data->save();
					redirect('crud');
				}
			}
			$this->load->view('formtambah');
		}

		public function ubah($id)
		{
			if($this->input->post('submit'))
			{
				if($this->data->validation("update"))
				{
					$this->data->edit($id);
					redirect('crud');
				}
			}
			$data['blog'] = $this->data->view_by($id);
			$this->load->view('formubah', $data);
		}

		public function hapus($id)
		{
			$this->data->delete($id);
			redirect('crud');
		}
	
	}
	
	/* End of file Crud.php */
	/* Location: ./application/controllers/Crud.php */