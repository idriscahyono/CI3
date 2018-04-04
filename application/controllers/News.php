<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class News extends CI_Controller {
 
 	public function index($jumlahNews)
 	{
 		$data = array();
 		$data['jumlahNews'] = $jumlahNews;
 		$this->load->view('news', $data);
 	}
 
 }
