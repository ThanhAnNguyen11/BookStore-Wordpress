<?php
    $saved_settings = get_option( 'wcp_animated_woostore' );
    $style = $saved_settings['animation_style'];
    $duration = $saved_settings['animation_duration'];
?>
<?php if ($style == 'None') {
    
} else { ?>
ul.products li {
    opacity: 0;
    position: relative;
    -webkit-animation: <?php echo 'wcp'.$style; ?> <?php echo $duration; ?>ms ease both;
    -webkit-animation-play-state: paused;
    -moz-animation: <?php echo 'wcp'.$style; ?> <?php echo $duration; ?>ms ease both;
    -moz-animation-play-state: paused;
    -o-animation: <?php echo 'wcp'.$style; ?> <?php echo $duration; ?>ms ease both;
    -o-animation-play-state: paused;
    animation: <?php echo 'wcp'.$style; ?> <?php echo $duration; ?>ms ease both;
    animation-play-state: paused;

    <?php if ($style == 'flip' || $style == 'flipInX' || $style == 'flipInY') { ?>
        
    backface-visibility: visible;
    -o-backface-visibility: visible;
    -moz-backface-visibility: visible;
    -webkit-backface-visibility: visible;

    <?php } ?>

    <?php if ($style == 'pageTop' || $style == 'pageTopBack') { ?>
        
    transform-origin: 50% 0%;
    -o-transform-origin: 50% 0%;
    -moz-transform-origin: 50% 0%;
    -webkit-transform-origin: 50% 0%;

    <?php } ?>

    <?php if ($style == 'pageRight' || $style == 'pageRightBack') { ?>
        
    transform-origin: 100% 50%;
    -o-transform-origin: 100% 50%;
    -moz-transform-origin: 100% 50%;
    -webkit-transform-origin: 100% 50%;

    <?php } ?>

    <?php if ($style == 'pageBottom' || $style == 'pageBottomBack') { ?>
        
    transform-origin: 50% 100%;
    -o-transform-origin: 50% 100%;
    -moz-transform-origin: 50% 100%;
    -webkit-transform-origin: 50% 100%;

    <?php } ?>

    <?php if ($style == 'pageLeft' || $style == 'pageLeftBack') { ?>
        
    transform-origin: 0% 50%;
    -o-transform-origin: 0% 50%;
    -moz-transform-origin: 0% 50%;
    -webkit-transform-origin: 0% 50%;

    <?php } ?>

    <?php if ($style == 'starwars') { ?>
        
    transform-origin: 50% 50%;
    -o-transform-origin: 50% 50%;
    -moz-transform-origin: 50% 50%;
    -webkit-transform-origin: 50% 50%; 

    <?php } } ?>
}