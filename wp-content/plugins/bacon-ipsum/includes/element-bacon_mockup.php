<?php


$bacon_tag = (strpos($atts['tag'],"||") || $atts['tag'] == "none") ? '' : $atts['tag'];
?>

<img class="<?php echo implode(", ", (array)$atts['class']); ?>" width="<?php echo implode(", ", (array)$atts['width']); ?>" height="<?php echo implode(", ", (array)$atts['height']); ?>" src="http://baconmockup.com/<?php echo implode(", ", (array)$atts['width']); ?>/<?php echo implode(", ", (array)$atts['height']); ?>/<?php echo $bacon_tag;?>" alt="<?php echo implode(", ", (array)$atts['alt']); ?>">
