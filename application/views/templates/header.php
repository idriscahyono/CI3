<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

  <title>Idris Cahyono</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<!--   
	<link rel="stylesheet" href="<?php echo base_url()."assets/" ?>css/jquery.dataTables.min.css">
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>

	<script src="assets/js/jquery2.0.3.min.js"></script>
	<script src="assets/js/raphael-min.js"></script>
	<script src="assets/js/morris.js"></script> -->
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Idris Cahyono</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="<?php echo site_url('home');?>">Home</a></li>
      <li><a href="<?php echo site_url('about');?>">About</a></li>      
      <li><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
      <li><a href="<?php echo site_url('news') ?>">News</a></li>
      <li><a href="<?php echo site_url('blog') ?>">Blog</a></li>
      <?php if (isset($_SESSION['levelUser'])) { ?>
      <li><a href="<?php echo site_url('blog/create') ?>">Tambah Blog</a></li>
      <li><a href="<?php echo site_url('category') ?>">Category</a></li>
      <li><a href="<?php echo site_url('datatables') ?>">Datatables</a></li>
      <li><a href="<?php echo site_url('ManageUser') ?>">Manage User</a></li>
      <li><a href="<?php echo site_url('user/logout') ?>">Logout</a></li>
      <?php } else {?>
      <li><a href="<?php echo site_url('user/register') ?>">Registrasi</a></li>
      <li><a href="<?php echo site_url('user/login') ?>">Login</a></li>

      <?php } ?>
    </ul>   
  </div>
</nav>
  	   <?php if($this->session->flashdata('user_registered')): ?>
       		<?php echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</div>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('login_failed')): ?>
        	<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
       <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
       <?php endif; ?>
        <?php if($this->session->flashdata('user_loggedin')): ?>
        	<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
       <?php endif; ?>

<!-- 		<div style="text-align: center;">
	       	<?php if(!$this->session->userdata('loggedin')) : ?>
   			<div class="btn-group" role="group" aria-label="Data">
	       		<?php echo anchor('user/register', 'Register', array('class' => 'btn btn-outline-light')); ?>
	       		<?php echo anchor('user/login', 'Login', array('class' => 'btn btn-outline-light')); ?>
	</div> -->

	   	<?php endif; ?>

	   	<?php if($this->session->userdata('loggedin')) : ?>
   			<div class="btn-group" role="group" aria-label="Data">
		       <?php echo anchor('blog/create', 'Artikel Baru', array('class' => 'btn btn-outline-light')); ?>
		       <?php echo anchor('category/create', 'Kategori Baru', array('class' => 'btn btn-outline-light')); ?>
		       <?php echo anchor('user/logout', 'Logout', array('class' => 'btn btn-outline-light')); ?>
   			</div>
		<?php endif; ?>
		</div>
