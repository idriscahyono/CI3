<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading"><?php echo $page_title ?></h1>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					
					<?php    
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>

					<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

					<?php echo form_open( current_url(), array('class' => 'needs-validation', 'novalidate' => '') ); ?>

					<div class="form-group">
						<label for="cat_name">Nama Kategori</label>
						<input type="text" class="form-control" name="cat_name" value="<?php echo set_value('cat_name', $category->cat_name) ?>" required>
						<div class="invalid-feedback">Isi judul dulu gan</div>
					</div>
					<div class="form-group">
						<label for="text">Deskripsi</label>
						<input type="text" class="form-control" name="cat_description" value="<?php echo set_value('cat_description', $category->cat_description) ?>" required>
						<div class="invalid-feedback">Isi deskripsinya dulu gan</div>
					</div>
					<button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url() ?>category/delete/<?php echo $category->cat_id ?>" class="btn btn-danger">Hapus</a>
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