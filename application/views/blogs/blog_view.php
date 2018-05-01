<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- Begin page content -->
	<main role="main">
		<section class="jumbotron text-center">
			<div class="container">
				<h1 class="jumbotron-heading"><?php echo $page_title ?></h1>
				
				<p>
					<?php echo anchor('blog/create', 'Tulis Artikel', array('class' => 'btn btn-primary')); ?>
				</p>
			</div>
		</section>

		<?php if( !empty($all_artikel) ) : ?>
		<div class="album py-5 bg-light">
			<div class="container">
				<div class="row">

					<?php
						// Kita looping data dari controller
						foreach ($all_artikel as $key) :
					?>

					<div class="col-md-4">
						<!-- Kita format tampilan blog dalam bentuk card -->
						<!-- https://getbootstrap.com/docs/4.0/components/card/ -->
						<div class="card mb-4 box-shadow border-0">
							
							<!-- Load thumbnail, jika ada -->
							<?php if( $key->post_thumbnail ) : ?>
							<img class="card-img-top" src="<?php echo base_url() .'uploads/'. $key->post_thumbnail ?>" style='width:360px; height: 190px; size: 100' alt="Card image cap">
							
							<!-- Jika tidak ada thumbnail, gunakan holder.js -->
							<?php ; else : ?>
							<img class="card-img-top" data-src="holder.js/100px190?theme=thumb&bg=eaeaea&fg=aaa&text=Thumbnail" alt="Card image cap">
							<?php endif; ?>
							
							<div class="card-body">

								<!-- Batasi cuplikan konten dengan substr sederhana -->
								<h5><?php echo character_limiter($key->post_title, 40) ?></h5>
								<small class="text-success text-uppercase"><?php echo $key->cat_name ?></small>
								<p class="card-text"><?php echo word_limiter($key->post_content, 20) ?></p>
								
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<!-- Untuk link detail -->
										<a href="<?php echo base_url(). 'blog/read/' . $key->post_slug ?>" class="btn btn-success">Baca</a>
										<a href="<?php echo base_url(). 'blog/edit/' . $key->post_id ?>" class="btn btn-info">Edit</a>
									</div>
									<small class="text-muted"><?php echo time_ago($key->post_date) ?></small>
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
	