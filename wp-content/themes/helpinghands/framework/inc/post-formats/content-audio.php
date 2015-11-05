<?php
/**
 * Theme Index Content - Audio Post Format
 *
 * @package	DigitalAgency
 * @author Skat
 * @copyright 2015, Skat Design
 * @link http://www.skat.tf
 * @since DigitalAgency 1.0
 */

global $sd_data;

$post_meta = $sd_data['sd_blog_post_meta_enable'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-blog-entry sd-audio-entry clearfix' ); ?>> 
	<div class="sd-entry-wrapper"> 
		<div class="sd-entry-audio">
			<?php $audio_url = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
			<?php echo do_shortcode( '[audio src="'. $audio_url .'"]' ); ?>
		</div>
		<!-- sd-entry-audio -->
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
			<?php the_excerpt(); ?>
		</div>
		<!-- sd-entry-content --> 
	</div>
	<!--sd-entry-wrapper --> 
</article>
<!-- sd-audio-entry --> 