<?php

$sd_campaign = new ATCF_Campaign( get_the_ID() );

if ( $sd_campaign === false ) return;
	
$sd_percent = $sd_campaign->percent_completed( 'raw' ) > 100 ? '100%' : $sd_campaign->percent_completed();
$sd_days    = $sd_campaign->days_remaining();
$sd_goal    = rtrim( rtrim( $sd_campaign->goal(), '0' ), '.' );
$sd_raised  = rtrim( rtrim( $sd_campaign->current_amount(), '0'), '.' );
?>
<div class="sd-campaign-carousel-item">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="sd-campaign-thumb">
			<figure>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'sd-campaign-grid' ); ?></a>
			</figure>
			<div class="sd-campaign-thumb-overlay sd-opacity-trans">
				<div class="sd-donate-button-wrapper">
					<a class="sd-donate-button sd-opacity-trans" data-campaign-id="<?php echo esc_attr( $sd_campaign->ID ); ?>"><?php _e( 'DONATE NOW', 'sd-framework' ); ?></a>
				</div>
				<!-- sd-donate-button-wrapper -->
			</div>
			<!-- sd-campaign-thumb-overlay -->
		</div>
		<!-- sd-portfolio-thumb -->
	<?php endif; ?>
	<div class="sd-carousel-item-content clearfix">
		<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
		<div class="sd-campaign-percent">
			<span class="sd-funded-line" style="width: <?php echo esc_attr( $sd_percent ); ?>;"><span class="sd-funded"><?php printf( __( '%s', 'sd-framework' ), $sd_campaign->percent_completed() ); ?></span></span>
		</div>
		<!-- sd-campaign-percent -->
		<span class="sd-raised"><span><?php _e( 'RAISED', 'sd-framework' ); ?></span> <?php echo $sd_raised; ?></span>
		<span class="sd-goal"><span><?php _e( 'GOAL', 'sd-framework' ); ?></span> <?php echo $sd_goal; ?></span>
	</div>
	<!-- sd-carousel-item-content -->
</div>
<!-- sd-campaign-carousel-item -->