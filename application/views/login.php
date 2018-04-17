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
      <li><a href="<?php echo site_url('contact') ?>">Contact</a></li>
      <li><a href="<?php echo site_url('news') ?>">News</a></li>
      <li><a href="<?php echo site_url('blog') ?>">Blog</a></li>
      <li><a href="<?php echo site_url('blog/create') ?>">Tambah Blog</a></li>
      <li><a href="<?php echo site_url('login') ?>">Login</a></li>
    </ul>
    <div class="navbar-form navbar-left" action="/action_page.php">
      	<div class="input-group">
        	<input type="text" class="form-control" placeholder="Search" name="search">
    	</div>
    	<button type="submit" class="btn btn-default">Submit</button>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#">About</a></li> -->
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Software <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Android</a></li>
          <li><a href="#">IOS</a></li>
          <li><a href="#">Windows</a></li>
        </ul>
       </li>
    </ul>   
  </div>
</nav>
	<div id="container">
		<div class="row">
				<form action="proseslogin.php" method="POST" name="loginadmin">
				    <div class="login-page">
				    <div class="form">
				      <form class="login-form">
				        <input type="text" name="username" placeholder="username" required="required"/>
				        <input type="password" name="password" placeholder="password" required="required"/>
				        <button type="submit" name="login">login</button>
				        <p class="message">Not registered? <a href="buatakun.php">Create an account</a></p>
				      </form>
				    </div>
				  </div>
		</div>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>
</body>
</html>