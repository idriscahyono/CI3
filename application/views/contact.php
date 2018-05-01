<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<h1>Contact</h1>
	<h1>Mengirim Data Dari Controler Ke View</h1>
		
		<table class="table table-striped table-hover">
			<tbody>
				<tr>
					<td>
						<?php echo $nama ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $alamat ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $email ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $nim ?>
					</td>
				</tr>
			</tbody>
		</table>

	<!-- <div id="body">
		<h2>Nama  : Idris Cahyono</h2>
		<h2>Nim	  	: 1641720184 </h2> -->
</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</body>
</html>