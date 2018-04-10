<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Modelblog extends CI_Model {
	
		public function pilih_semua()
		{
			return $this->db->get('blog');
		}
		
		public function pilih_satu($id)
		{
			return $this->db->get_where('blog', array('id'=>$id));
		}

	}
	
	/* End of file Model_Blog.php */
	/* Location: ./application/models/Model_Blog.php */