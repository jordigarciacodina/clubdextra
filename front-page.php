<?php
/**
 * Club Dextra.
 *
 * This file adds the front template to the Club Dextra Theme.
 *
 * @package Club Dextra
 * @author  Bicicleta Studio
 * @license GPL-2.0-or-later
 * @link    https://bicicleta.studio
 */

// Add custom body classes
add_filter( 'body_class', 'bs_add_custom_body_classes');
function bs_add_custom_body_classes( $classes ) {
	$classes[] = 'super-full-width-page';
    if (rcp_user_has_active_membership()):
		$classes[] = 'rcp-active';
	endif;

	return $classes;
	
}

// Display Front Page Sections
remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'bs_display_front_page_sections');
function bs_display_front_page_sections() {
    if (!rcp_user_has_active_membership()): ?>

	<section class="hero">
		<div class="wrap">
			<div class="box">
				<h1><?php echo get_theme_mod('hero_title'); ?></h1>
				<p><?php echo get_theme_mod('hero_description'); ?></p>
				<div class="cta">
					<button class="primary" onclick="window.location.href='<?php echo get_theme_mod('hero_primary_cta_link'); ?>'"><?php echo get_theme_mod('hero_primary_cta_text'); ?></button>
				</div>
			</div>
		</div>
	</section>
	<section class="featureds">
		<div class="wrap">
			<div class="row">
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_1'); ?>">
					<p><?php echo get_theme_mod('featured_title_1'); ?></p>
				</div>
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_2'); ?>">
					<p><?php echo get_theme_mod('featured_title_2'); ?></p>
				</div>
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_3'); ?>">
					<p><?php echo get_theme_mod('featured_title_3'); ?></p>
				</div>
				<div class="box">
					<img src="<?php echo get_theme_mod('featured_img_4'); ?>">
					<p><?php echo get_theme_mod('featured_title_4'); ?></p>
				</div>
			</div>
		</div>
	</section>
	<?php else: ?>
	<?php endif; ?>
	<section class="posts-loop directos">
		<div class="wrap">
			<h3><?php echo get_theme_mod('directos_content_title'); ?></h3>
			<div class="posts-wrapper"> 
			
			<?php global $post;

			$args = array(
				'posts_per_page' => 3,
				'post_type' 	=> 'directo',
				'order'	 		=> 'DESC'
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
			setup_postdata($post); ?>
				<a href="<?php the_permalink(); ?>">
					<article class="directo">
						<header class="entry-header">
							<?php the_post_thumbnail(); ?>
						</header>
						<div class="entry-content">
							<h2 class="entry-title"><?php the_title(); ?></h2>
						</div>
					</article>
				</a><?php

   			endforeach;
   			wp_reset_postdata();?>

			</div>
			<div class="cta">
				<button onclick="window.location.href='<?php echo get_theme_mod('directos_content_cta_link'); ?>'"><?php echo get_theme_mod('directos_content_cta_text'); ?></button>
			</div>
		</div>
	</section>

	<section class="posts-loop consultorias">
		<div class="wrap">
			<h3><?php echo get_theme_mod('consultorias_content_title'); ?></h3>
			<div class="posts-wrapper"> 
			
			<?php global $post;

			$args = array(
				'posts_per_page' 	=> 3,
				'post_type' 		=> 'consultoria',
				'order' 			=> 'DESC'
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
			setup_postdata($post); ?>
				<a href="<?php the_permalink(); ?>">
					<article class="consultoria">
						<header class="entry-header">
							<?php the_post_thumbnail(); ?>
						</header>
						<div class="entry-content">
							<h2 class="entry-title"><?php the_title(); ?></h2>
						</div>
					</article>
				</a><?php

   			endforeach;
   			wp_reset_postdata();?>

			</div>
			<div class="cta">
				<button onclick="window.location.href='<?php echo get_theme_mod('consultorias_content_cta_link'); ?>'"><?php echo get_theme_mod('consultorias_content_cta_text'); ?></button>
			</div>
		</div>
	</section>
	<section class="posts-loop cursos">
		<div class="wrap">
			<h3><?php echo get_theme_mod('cursos_content_title'); ?></h3>
			<div class="posts-wrapper"> 
			
			<?php global $post;

			$args = array(
				'posts_per_page' 	=> 3,
				'post_type' 		=> 'course',
				'order' 			=> 'DESC'
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
			setup_postdata($post); ?>
				<a href="<?php the_permalink(); ?>">
					<article class="curso">
						<header class="entry-header">
							<?php the_post_thumbnail(); ?>
						</header>
						<div class="entry-content">
							<h2 class="entry-title"><?php the_title(); ?></h2>
						</div>
					</article>
				</a><?php

   			endforeach;
   			wp_reset_postdata();?>

			</div>
			<div class="cta">
				<button onclick="window.location.href='<?php echo get_theme_mod('cursos_content_cta_link'); ?>'"><?php echo get_theme_mod('cursos_content_cta_text'); ?></button>
			</div>
		</div>
	</section>
    <?php if (!rcp_user_has_active_membership()): ?>
	<section class="testimonials">
		 <div class="wrap">
		 	<h3><?php echo get_theme_mod('testimonios_content_title'); ?></h3>
			<div class="testimonials-wrapper">	<?php

			global $post;

			$args = array(
				'posts_per_page' => 3,
				'post_type' 	 => 'testimonio',
			);

			$myposts = get_posts($args);

			foreach ($myposts as $post):
				setup_postdata($post); ?>
				<article class="testimonial">
					<header class="entry-header">
						<?php the_post_thumbnail(); ?>
					</header>
					<div class="entry-content">
						<?php the_excerpt(); ?>
						<h4 class="testimonial-name"><?php the_title(); ?></h4>
					</div>
				</article> <?php
			endforeach;

			wp_reset_postdata(); ?>
					
			</div>
			<div class="cta">
				<button class="primary" onclick="window.location.href='<?php echo get_theme_mod('testimonios_content_cta_link'); ?>'"><?php echo get_theme_mod('testimonios_content_cta_text'); ?></button>
			</div>
		</div>
	</section> 
	<?php else: ?>

	<?php endif;

}

genesis();
