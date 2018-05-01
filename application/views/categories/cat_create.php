<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<main role="main" class="container">
	<section class="jumbotron text-center">
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">

					<?php echo form_open( 'category/create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>

					<div class="form-group">
						<label for="cat_name">Nama Kategori</label>
						<input type="text" class="form-control" name="cat_name" value="<?php echo set_value('cat_name') ?>" required>
						<div class="invalid-feedback">Judul Perlu Diisi</div>
					</div>
					<div class="form-group">
						<label for="text">Deskripsi</label>
						<input type="text" class="form-control" name="cat_description" value="<?php echo set_value('cat_description') ?>" required>
						<div class="invalid-feedback">Deskripsi Perlu Diisi</div>
					</div>
					<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</section>
</main>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>