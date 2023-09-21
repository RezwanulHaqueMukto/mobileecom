<section id="top-footer">
	<div class="our-feature">
		<div class="container our-feature-content">
			<div class="row">
				<?php
				$footer_feature_posts = new WP_Query(array(
					'post_type' => 'footer_our_features',
					'posts_per_page' => 4,
				));

				if ($footer_feature_posts->have_posts()) {
					while ($footer_feature_posts->have_posts()) {
						$footer_feature_posts->the_post();
						// Display post content or thumbnail here
						$thumbnail_url = get_the_post_thumbnail_url();
				?>
						<div class="col-lg-3 col-sm-6 col-12">
							<div class="our-feature-inner-content">
								<div class="image-container pe-4">
									<img src="<?php echo esc_url($thumbnail_url); ?>">
								</div>
								<div class="text-container">
									<h2 class="title"><?php the_title(); ?></h2>
									<p><?php the_content(); ?></p>
								</div>
							</div>
						</div>
				<?php
					}
					wp_reset_postdata();
				}
				?>

			</div>
		</div>
	</div>

	<div class="brands">
		<div class="container">
			<div class="section-title">
				<h2>Our brands</h2>
			</div>
			<div class="our-brands-content">
				<div class="row">

					<?php
					$footer_brand_posts = new WP_Query(array(
						'post_type' => 'footer_brand',
						'posts_per_page' => 6,
					));

					if ($footer_brand_posts->have_posts()) {
						while ($footer_brand_posts->have_posts()) {
							$footer_brand_posts->the_post();
							// Display post content or thumbnail here
							$thumbnail_url = get_the_post_thumbnail_url();
					?>
							<div class="col-lg-2 col-md-4 col-6">
								<div class="brands-inner-content">
									<img src="<?php echo esc_url($thumbnail_url); ?>">
								</div>
							</div>
					<?php
						}
						wp_reset_postdata();
					}
					?>




				</div>
			</div>

		</div>
	</div>
</section>