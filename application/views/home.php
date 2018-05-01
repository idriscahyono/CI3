<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<h1>Selamat Datang</h1>

	<div id="body">
		<h2>Nama  : Idris Cahyono</h2>
		<h2>Nim	  	: 1641720184 </h2>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div class="table-responsive">
		<h1>Biodata Query Array</h1>
		<table class="table table-hover">
			<tbody>
				<?php foreach ($biodata_array as $key){ ?>
				<tr>
					<td><?php echo $key['id'] ?></td>
				</tr>
				<tr>
					<td><?php echo $key['nama'] ?></td>
				</tr>
				<tr>
					<td><?php echo $key['nim'] ?></td>
				</tr>
				<tr>
					<td><?php echo $key['alamat'] ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div class="table-responsive">
		<h1>Biodata Dari Object</h1>
	<table class="table table-hover">
		<tbody>
			<?php foreach ($biodata_object as $key){ ?>
			<tr>
				<td><?php echo $key->id ?></td>
			</tr>
			<tr>
				<td><?php echo $key->nama ?></td>
			</tr>
			<tr>
				<td><?php echo $key->nim ?></td>
			</tr>
			<tr>
				<td><?php echo $key->alamat ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div class="table-responsive">
		<h1>Biodata Query Builder Array</h1>
		<table class="table table-hover">
			<tbody>
				<?php foreach ($biodataBuilder_array as $key){ ?>
				<tr>
					<td><?php echo $key['id'] ?></td>
				</tr>
				<tr>
					<td><?php echo $key['nama'] ?></td>
				</tr>
				<tr>
					<td><?php echo $key['nim'] ?></td>
				</tr>
				<tr>
					<td><?php echo $key['alamat'] ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div class="table-responsive">
		<h1>Biodata Dari Builder Object</h1>
	<table class="table table-hover">
		<tbody>
			<?php foreach ($biodataBuilder_object as $key){ ?>
			<tr>
				<td><?php echo $key->id ?></td>
			</tr>
			<tr>
				<td><?php echo $key->nama ?></td>
			</tr>
			<tr>
				<td><?php echo $key->nim ?></td>
			</tr>
			<tr>
				<td><?php echo $key->alamat ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	</div>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>