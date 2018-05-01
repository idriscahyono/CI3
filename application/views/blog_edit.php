<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Begin page content -->
<main role="main" class="container">
	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Edit Artikel</h1>
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

					<?php echo form_open_multipart(); ?>

					<div class="form-group">
						<label for="title">Judul Artikel</label>
						<input type="text" class="form-control" name="title" value="<?php echo set_value('title', $artikel->title) ?>">
					</div>
					<div class="form-group">
						<label for="text">Konten</label>
						<textarea class="form-control" name="text" rows="3"><?php echo set_value('text', $artikel->content) ?></textarea>
					</div>
					<div class="form-group">
						<!-- Load thumbnail, jika ada -->
						<?php if( $artikel->post_thumbnail ) : ?>
						<img class="card-img-top" src="<?php echo base_url() .'uploads/'. $artikel->thumbnail ?>" alt="Card image cap" width=300>
						<?php endif; ?>

						<label for="thumbnail">Gambar thumbnail</label>
						<input type="file" class="form-control-file" name="thumbnail">
					</div>
					<button type="submit" class="btn btn-primary">Edit</button>
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