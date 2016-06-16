<?php

if ( ! defined( 'BANNER_URL' ) ) {
		define( 'BANNER_URL', plugin_dir_url( __FILE__ ) );
}


$banner = WP_PLUGIN_URL . '/bacon-ipsum/assets/images/';

?>

<a href="http://baconipsum.com"><img src="<?php echo $banner;?><?php echo implode(", ", (array)$atts['banner']); ?>.gif"></a>
