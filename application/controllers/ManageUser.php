<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageUser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('form');
	}

	public function index()
	{
		$user['data'] = $this->User_model->get_all_user();

		$this->load->view('templates/header');
		$this->load->view('user/manage', $user);
		$this->load->view('templates/footer');
	}

	public function delete($id)
	{
		$user['data'] = $this->User_model->get_all_user();
		if($this->User_model->delete($id))
        {
        	
	        $this->load->view('templates/header');
	        $this->load->view('user/manage', $user);
	        $this->load->view('templates/footer'); 
		}
 	}

}

/* End of file ManageUser.php */
/* Location: ./application/controllers/ManageUser.php */