<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * @Packge       : Arryxen Companion
 * @Version      : 1.0
 * @Author       : Arryxen
 * @Author URI 	 : https://arryxen.com
 *
 */

// Section Heading
function arryxen_section_heading( $title = '', $subtitle = '' ) {
	if( $title || $subtitle ) :
	?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center">
						<?php
						// Sub title
						if ( $subtitle ) {
							echo '<p>' . esc_html( $subtitle ) . '</p>';
						}
						// Title
						if ( $title ) {
							echo '<h2>' . esc_html( $title ) . '</h2>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
}
