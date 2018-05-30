<?php $this->load->view('templates/header'); ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
<?php $this->load->view('templates/footer'); ?>