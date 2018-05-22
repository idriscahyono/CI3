<?php echo form_open('user/register', array('class' => 'need-validation', 'novalidate' => '')); ?>

<div class="form-group">
	<label>Nama Lengkap</label>
	<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
</div>
<div class="form-group">
	<label>Email</label>
	<input type="text" name="email" class="form-control" placeholder="Email">
</div>
<div class="form-group">
	<label>Alamat</label>
	<input type="text" name="alamat" class="form-control" placeholder="Alamat">
</div>
<div class="form-group">
	<label>Kode Pos</label>
	<input type="text" name="kodePos" class="form-control" placeholder="Kode Pos">
</div>
<div class="form-group">
	<label>Username</label>
	<input type="text" name="username" class="form-control" placeholder="Username">
</div>
<div class="form-group">
	<label>Password</label>
	<input type="text" name="password" class="form-control" placeholder="Password">
</div>
<div class="form-group">
	<label>Ulangi Password</label>
	<input type="text" name="password2" class="form-control" placeholder="Konfirmasi Password">
</div>
<button type="submit" class="btn btn-danger btn-block" >Daftar</button>
<?php echo form_close(); ?>