<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data extends CI_Model {
	
		public function view()
		{
			return $this->db->get('blog')->result();
		}

		public function view_by($id)
		{
			$this->db->where('id', $id);
			return $this->db->get('blog')->row();

		}

		public function validation($mode)
		{
			$this->load->library('form_validation');
    		if($mode == "save")
    			$this->form_validation->set_rules('input_id', 'id', 'required');
      			$this->form_validation->set_rules('input_author', 'author', 'required');
    			$this->form_validation->set_rules('input_date', 'date', 'required');
    			$this->form_validation->set_rules('input_title', 'title', '	required');
    			$this->form_validation->set_rules('input_content', 'content', 'required');
    			$this->form_validation->set_rules('input_image', 'image_file', 'required');
      
    			if($this->form_validation->run())
      				return TRUE;
    			else
      				return FALSE; 
		}

		public function save()
		{
			$data = array(
					"id" => $this->input->post('input_id'),
     				"author" => $this->input->post('input_author'),
      				"date" => $this->input->post('input_date'),
      				"title" => $this->input->post('input_title'),
      				"content" => $this->input->post('input_content'),
      				"image_file" => $this->input->post('input_image')
      			);
			$this->db->insert('blog', $data);
		}

		public function edit($id)
		{
			$data = array(
					"id" => $this->input->post('input_id'),
     				"author" => $this->input->post('input_author'),
      				"date" => $this->input->post('input_date'),
      				"title" => $this->input->post('input_title'),
      				"content" => $this->input->post('input_content'),
      				"image_file" => $this->input->post('input_image')
      			);
			$this->db->where('id', $id);
			$this->db->update('blog', $data);

		}

		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('blog');
		}
		
	}
	
	/* End of file data.php */
	/* Location: ./application/models/data.php */
