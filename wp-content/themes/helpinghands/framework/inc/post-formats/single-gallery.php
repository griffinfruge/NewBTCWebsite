<?php
/**
 * Theme Single Post - Gallery Post Format
 *
 * @package	DigitalAgency
 * @author Skat
 * @copyright 2015, Skat Design
 * @link http://www.skat.tf
 * @since DigitalAgency 1.0
 */
 
global $sd_data;

$blog_layout  = $sd_data['sd_blog_layout'];
$thumb_size   = ( $blog_layout == '2' ) ? 'full' : 'sd-blog-thumbs' ;
$post_meta    = $sd_data['sd_blog_post_meta_enable'];
?>
<div class="sd-entry-wrapper clearfix">
	<div class="sd-entry-gallery">
		<div class="flexslider sd-entry-gallery-slider">
			<ul class="slides">
				<?php if ( $images = get_children( array( 'post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image' ) ) ) : ?>
					<?php foreach( $images as $image ) :  ?>
						<li><a href="<?php the_permalink(); ?>" title="<?php printf( __( 'Permalink to %s', 'sd-framework' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
								<figure><?php echo wp_get_attachment_image( $image->ID, $thumb_size ); ?></figure>
							</a>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
		<!-- flexslider sd-entry-gallery-slider -->
	</div>
	<!-- sd-entry-gallery --> 
	<header>
		<h2 class="sd-entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'sd-framework' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h2>
		<?php if ( $post_meta == '1' ) : ?>
			<?php get_template_part( 'framework/inc/post-meta' ); ?>
		<?php endif; ?>
	</header>
	<div class="sd-entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( 'before=<strong class="page-navigation clearfix">&after=</strong>' ); ?>
	</div>
	<!-- sd-entry-content --> 
</div>
<!-- sd-entry-wrapper --> 