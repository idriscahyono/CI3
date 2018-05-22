<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			
			$this->load->library('form_validation');
			$this->load->helper('MY_helper');
			$this->load->model('user_model');
		}

		public function register()
		{
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('kodePos', 'Kode Pos', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('user/register');
				$this->load->view('templates/footer');
			}
			else
			{
				$encript_password = md5($this->input->post('password'));
				$this->user_model->registered($encript_password);

				$this->session->set_flashdata('user_registered', 'Selamat Anda Telah Teregistrasi');
				redirect('blog');
			}
		}

		public function login()
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('user/login');
				$this->load->view('templates/footer');
			}
			else
			{
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));

				$id_user = $this->user_model->login($username, $password);

				if($id_user)
				{
					$data_user = array(
						'user_id' => $id_user,
						'username' => $username,
						'password' =>$password,
						'logged_in' => true 
					);

					$this->session->set_userdata($data_user);

					$this->session->set_flashdata('user_loggedin', 'Sekarang Sudah Login');
					redirect('blog');
				}
				else
				{
					$this->session->set_flashdata('login_failed', 'Gagal Login');
					redirect('user/login');
				}
			}
		}

		public function logout()
		{
			$this->session->unset_userdata('loggedin');
			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('username');

			$this->session->flashdata('user_loggedout', 'Anda Sekarang Sudah Logout');

			redirect('user/login');
		}
	
	}
	
	/* End of file User.php */
	/* Location: ./application/controllers/User.php */