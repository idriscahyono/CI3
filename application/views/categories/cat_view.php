<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<main role="main">
		<section class="jumbotron text-center">
			<div class="container">
				<h1 class="jumbotron-heading"><?php echo $page_title ?></h1>
				
				<p>
					<?php echo anchor('category/create', 'Buat Kategori Baru', array('class' => 'btn btn-primary')); ?>
				</p>
			</div>
		</section>

		<?php if( !empty($categories) ) : ?>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">

					<?php
						// Kita looping data dari controller
						foreach ($categories as $key) :
					?>

					<div class="col-md-4">
						<!-- Kita format tampilan blog dalam bentuk card -->
						<!-- https://getbootstrap.com/docs/4.0/components/card/ -->
						<div class="card mb-4 box-shadow border-0">
														
							<div class="card-body">

								
								<h5><?php echo character_limiter($key->cat_name, 40) ?></h5>
								<p class="card-text"><?php echo word_limiter($key->cat_description, 20) ?></p>
								
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<!-- link detail -->
										<a href="<?php echo base_url('category/artikel/'.$key->cat_id) ?>" class="btn btn-primary">Lihat Artikel</a>
										<a href="<?php echo base_url(). 'category/edit/' . $key->cat_id ?>" class="btn btn-danger">Edit</a>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
		<?php else : ?>
		<p>Belum ada data bosque.</p>
		<?php endif; ?>
		
	</main>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>