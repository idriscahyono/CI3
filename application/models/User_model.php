<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function registered($encript_password)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'kodepos' => $this->input->post('kodePos'),
			'username' => $this->input->post('username'),
			'password' => $encript_password
		);

		return $this->db->insert('users', $data);
	}

	public function login($username, $password)
	{
		// $this->db->where('username', $username);
		// $this->db->where('password', $password);
		$result = $this->db->query("select * from users where username = '".$username."' AND password = '".$password."'");
		// $result = $this->db->get('users');

		if($result->num_rows() == 1)
		{
			return $result->result_array();
		}
		else
		{
			return false;
		}
	}
	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */