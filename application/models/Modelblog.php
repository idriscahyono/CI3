<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Modelblog extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}
	
		public function pilih_semua()
		{
			$query = $this->db->get('blog');
			return $query->result();

		}
		
		public function pilih_satu($id)
		{
			$query = $this->db->get_where('blog', array('id'=>$id));
			return $query->row();
		}

		public function pilih_dengan_slug($slug)
		{
			$query = $this->db->get_where('blog', array('post_slug' => $slug));

			return $query->row();
		}

		public function tambah_artikel($data)
		{
			return $this->db->insert('blog', $data);
		}

		public function update_artikel($data, $id)
		{
			if( !empty($data) && !empty($id))
			{
				$update = $this->db->update('blog', $data, array('id' =>$id ));
				return $update ? true : false;
			}
			else
			{
				return false;
			}
		}

		public function delete_artikel()
		{
			if(!empty($id))
			{
				$delete = $this->db->delete('blog',array('id' => $id));
				return $delete ? true : false;
			}
			else
			{
				return false;
			}
		}

	}
	
	/* End of file Model_Blog.php */
	/* Location: ./application/models/Model_Blog.php */