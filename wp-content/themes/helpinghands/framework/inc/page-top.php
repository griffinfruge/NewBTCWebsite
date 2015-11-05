<?php
/**
 * Page Titles
 *
 * @package	HelpingHands
 * @author Skat
 * @copyright 2015, Skat Design
 * @link http://www.skat.tf
 * @since HelpingHands 1.0
 */

global $sd_data, $post;

wp_reset_query();

$hide_title = rwmb_meta( 'sd_page_title', 'type=checkbox');

?>
<?php if ( !is_front_page() ) : ?>
	<div class="sd-page-top clearfix <?php if ( is_singular( 'download' ) ||  $hide_title == 1 ) { echo 'sd-display-none'; } ?>">
		<div class="container"> 
			<!-- page title -->
			<?php if( is_archive() ) : ?>

				<?php if ( have_posts() ) : ?>
				
					<?php  if ( is_category() ) { ?>
						<h2>
							<?php single_cat_title(); ?>
						</h2>
						
					<?php  } elseif ( is_author() ) { ?>
						<h2>
							<?php _e( 'All Posts by', 'sd-framework' ); ?> <?php the_author(); ?>
						</h2>
		
					<?php  } elseif( is_tag() ) { ?>
						<h2>
							<?php _e( 'Tagged as:', 'sd-framework' ); ?>
							<?php single_tag_title(); ?>
						</h2>
		
					<?php  } elseif ( is_day() ) { ?>
						<h2>
							<?php _e( 'Archive for', 'sd-framework' ); ?>
							<?php the_time( 'F jS, Y' ); ?>
						</h2>
			
					<?php  } elseif ( is_month() ) { ?>
						<h2>
							<?php _e( 'Archive for', 'sd-framework' ); ?>
							<?php the_time( 'F, Y' ); ?>
						</h2>
					<?php  } elseif ( is_year() ) { ?>
						<h2>
							<?php _e( 'Archive for', 'sd-framework' ); ?>
							<?php the_time( 'Y' ); ?>
						</h2>
	
					<?php  } elseif ( isset( $_GET['paged']) && !empty( $_GET['paged']) ) { ?>
						<h2>
							<?php _e( 'Archive', 'sd-framework' ); ?>
						</h2>
						
					<?php  } elseif ( sd_is_woo() && is_shop() ) { ?>
						<h2>
							<?php woocommerce_page_title(); ?>
						</h2>

		
					<?php } else { ?>
						<h2>
							<?php single_cat_title(); ?>
						</h2>
					<?php } ?>
				<?php endif; ?>
		
			<?php elseif ( is_search() ) : ?>
				<h2>
					<?php _e('Search Results for:', 'sd-framework'); ?>
					<?php $allsearch = new WP_Query("s=$s&amp;showposts=-1"); $key = esc_html( $s, 1 ); echo '"' . $key . '"'; wp_reset_query(); ?>
				</h2>
			<?php elseif ( is_404() ) : ?>
				<h2>
					<?php echo $sd_data['sd_404_title']; ?>
				</h2>
			<?php else : ?>
				<h2>
					<?php
						$post_id = $post->ID;
						echo get_the_title( $post_id );
					?>
				</h2>
			<?php endif; ?>
	
		</div>
		<!-- container -->	
	</div>
	<!-- sd-page-top -->
<?php endif; ?>