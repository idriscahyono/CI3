<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('MY_helper');
			$this->load->model('user_model');
		}

		public function register()
		{
			$levelUser = $this->session->userdata('levelUser');
			if ($levelUser['level'] == 1)
			{
				$this->load->view('templates/header');
				$this->load->view('user/login');
				$this->load->view('templates/footer');
			}
			else
			{
				$this->form_validation->set_rules('nama', 'Nama', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
				$this->form_validation->set_rules('alamat', 'Alamat', 'required');
				$this->form_validation->set_rules('kodePos', 'Kode Pos', 'required');
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]');

				if ($this->form_validation->run() == TRUE) {
					$encript_password = md5($this->input->post('password'));
					$this->user_model->registered($encript_password);

					$this->session->set_flashdata('user_registered', 'Selamat Anda Telah Teregistrasi');
					redirect('blog');
				}
				else
				{
					$this->load->view('templates/header');
					$this->load->view('user/register');
					$this->load->view('templates/footer');
				}
			}
			
		}

		public function login()
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('user/login');
				$this->load->view('templates/footer');
			}
			else
			{
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));

				$dataUser['user'] = $this->user_model->login($username, $password);

				if($dataUser['user']!=FALSE)
				{
					foreach ($dataUser['user'] as $key) {
						$data = array(
							'user_id' => $key['user_id'],
							'username' => $username,
							'password' =>$password,
							'level' => $key['level'],
							'logged_in' => true
						);

						$this->session->set_userdata('levelUser', $data);

						$this->session->set_flashdata('user_loggedin', 'Berhasil Login');
						redirect('blog');
					}
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
			$this->session->unset_userdata('levelUser');

			$this->session->flashdata('user_loggedout', 'Anda Sekarang Sudah Logout');

			redirect('user/login');
		}
	
	}
	
	/* End of file User.php */
	/* Location: ./application/controllers/User.php */