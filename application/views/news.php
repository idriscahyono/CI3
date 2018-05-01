<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<h1>News</h1>

	<div class="colxs-12 col-sn-12 col-md-12 col-lg-12">
		<?php for ($i=0; $i < $jumlahNews; $i++) { ?> 
			Jumlah Berita <br>
		<?php } ?>
		
	</div>

	<!-- <div id="body">
		<h2>Nama  : Idris Cahyono</h2>
		<h2>Nim	  	: 1641720184 </h2>
	</div> -->

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>