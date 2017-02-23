<?php
/**
* Plugin Name: ads-customize.
* Description: Đây là plugin đầu tiên mà tôi viết dành riêng cho website này.
* Plugin Author: MinhDat.
*/

?>

<?php
// Creating the widget 
class wpb_widget extends WP_Widget {
//Thong tin
function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget', 

// Widget name will appear in UI
__('WPBeginner Widget', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
$path = wp125_get_plugin_dir('url');
// This is where you run the code and display the output
echo "<div class='contain'>
<link href='".$path."/gwdpage_style.css' rel='stylesheet'>
  <link href='".$path."/gwdpagedeck_style.css' rel='stylesheet'>
  <link href='".$path."/gwddoubleclick_style.css' rel='stylesheet'>
  <link href='".$path."/gwdimage_style.css' rel='stylesheet'>
  <link href='".$path."/gwdtaparea_style.css' rel='stylesheet'>
  <style type='text/css'>
  .contain {
    height: 280px;
    width: 336px;
  }
  </style>
  <style type='text/css' id='gwd-lightbox-style'>.gwd-lightbox {
    overflow: hidden;
    border: 1px dashed rgb(160, 160, 160);
}</style>
  <style type='text/css' id='gwd-text-style'>p {
    margin: 0px;
}
h1 {
    margin: 0px;
}
h2 {
    margin: 0px;
}
h3 {
    margin: 0px;
}</style>
  <style type='text/css'>html,
body {
    width: 100%;
    height: 100%;
    margin: 0px;
}
.gwd-page-container {
    position: relative;
    width: 100%;
    height: 100%;
}
.gwd-page-content {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
    -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
    -moz-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
    perspective: 1400px;
    -webkit-perspective: 1400px;
    -moz-perspective: 1400px;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    position: absolute;
    background-color: transparent;
}
.gwd-page-wrapper {
    position: absolute;
    transform: translateZ(0px);
    -webkit-transform: translateZ(0px);
    -moz-transform: translateZ(0px);
    background-color: rgb(255, 255, 255);
}
.gwd-page-size {
    width: 336px;
    height: 280px;
}
@keyframes gwd-empty-animation {
    0% {
        opacity: 0.001;
    }
    100% {
        opacity: 0;
    }
}
@-webkit-keyframes gwd-empty-animation {
    0% {
        opacity: 0.001;
    }
    100% {
        opacity: 0;
    }
}
@-moz-keyframes gwd-empty-animation {
    0% {
        opacity: 0.001;
    }
    100% {
        opacity: 0;
    }
}
.gwd-img-1igv {
    position: absolute;
    left: 153px;
    top: 128px;
    width: 30px;
    height: 25px;
    transform-origin: 15px 12.5px 0px;
    -webkit-transform-origin: 15px 12.5px 0px;
    -moz-transform-origin: 15px 12.5px 0px;
    opacity: 0;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    transform: scale3d(1, 1, 1);
    -webkit-transform: scale3d(1, 1, 1);
    -moz-transform: scale3d(1, 1, 1);
}
@keyframes gwd-gen-lfplgwdanimation_gwd-keyframes {
    0% {
        transform: scale3d(1, 1, 1);
        -webkit-transform: scale3d(1, 1, 1);
        -moz-transform: scale3d(1, 1, 1);
        opacity: 0;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    100% {
        transform: scale3d(11.24, 11.24, 1);
        -webkit-transform: scale3d(11.24, 11.24, 1);
        -moz-transform: scale3d(11.24, 11.24, 1);
        opacity: 1;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
}
@-webkit-keyframes gwd-gen-lfplgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: scale3d(1, 1, 1);
        opacity: 0;
        -webkit-animation-timing-function: linear;
    }
    100% {
        -webkit-transform: scale3d(11.24, 11.24, 1);
        opacity: 1;
        -webkit-animation-timing-function: linear;
    }
}
@-moz-keyframes gwd-gen-lfplgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: scale3d(1, 1, 1);
        opacity: 0;
        -moz-animation-timing-function: linear;
    }
    100% {
        -moz-transform: scale3d(11.24, 11.24, 1);
        opacity: 1;
        -moz-animation-timing-function: linear;
    }
}
#page1.gwd-play-animation .gwd-gen-lfplgwdanimation {
    animation: gwd-gen-lfplgwdanimation_gwd-keyframes 0.495s linear 0s 1 normal forwards;
    -webkit-animation: gwd-gen-lfplgwdanimation_gwd-keyframes 0.495s linear 0s 1 normal forwards;
    -moz-animation: gwd-gen-lfplgwdanimation_gwd-keyframes 0.495s linear 0s 1 normal forwards;
}
.gwd-img-1t76 {
    position: absolute;
    width: 130px;
    height: 130px;
    left: 103px;
    top: 20px;
    transform: translate3d(0px, -115px, 0px);
    -webkit-transform: translate3d(0px, -115px, 0px);
    -moz-transform: translate3d(0px, -115px, 0px);
    opacity: 0;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
}
@keyframes gwd-gen-11sigwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0px, -115px, 0px) scale3d(1, 1, 1);
        -webkit-transform: translate3d(0px, -115px, 0px) scale3d(1, 1, 1);
        -moz-transform: translate3d(0px, -115px, 0px) scale3d(1, 1, 1);
        opacity: 0;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    49.75% {
        transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        -webkit-transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        -moz-transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        opacity: 1;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    60.4% {
        transform: translate3d(0px, 49px, 0px) scale3d(1, 0.615385, 1);
        -webkit-transform: translate3d(0px, 49px, 0px) scale3d(1, 0.615385, 1);
        -moz-transform: translate3d(0px, 49px, 0px) scale3d(1, 0.615385, 1);
        opacity: 1;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    80.5% {
        transform: translate3d(0px, -38px, 0px) scale3d(1, 1, 1);
        -webkit-transform: translate3d(0px, -38px, 0px) scale3d(1, 1, 1);
        -moz-transform: translate3d(0px, -38px, 0px) scale3d(1, 1, 1);
        opacity: 1;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    100% {
        transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        -webkit-transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        -moz-transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        opacity: 1;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
}
@-webkit-keyframes gwd-gen-11sigwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0px, -115px, 0px) scale3d(1, 1, 1);
        opacity: 0;
        -webkit-animation-timing-function: linear;
    }
    49.75% {
        -webkit-transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        opacity: 1;
        -webkit-animation-timing-function: linear;
    }
    60.4% {
        -webkit-transform: translate3d(0px, 49px, 0px) scale3d(1, 0.615385, 1);
        opacity: 1;
        -webkit-animation-timing-function: linear;
    }
    80.5% {
        -webkit-transform: translate3d(0px, -38px, 0px) scale3d(1, 1, 1);
        opacity: 1;
        -webkit-animation-timing-function: linear;
    }
    100% {
        -webkit-transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        opacity: 1;
        -webkit-animation-timing-function: linear;
    }
}
@-moz-keyframes gwd-gen-11sigwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0px, -115px, 0px) scale3d(1, 1, 1);
        opacity: 0;
        -moz-animation-timing-function: linear;
    }
    49.75% {
        -moz-transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        opacity: 1;
        -moz-animation-timing-function: linear;
    }
    60.4% {
        -moz-transform: translate3d(0px, 49px, 0px) scale3d(1, 0.615385, 1);
        opacity: 1;
        -moz-animation-timing-function: linear;
    }
    80.5% {
        -moz-transform: translate3d(0px, -38px, 0px) scale3d(1, 1, 1);
        opacity: 1;
        -moz-animation-timing-function: linear;
    }
    100% {
        -moz-transform: translate3d(0px, 24px, 0px) scale3d(1, 1, 1);
        opacity: 1;
        -moz-animation-timing-function: linear;
    }
}
#page1.gwd-play-animation .gwd-gen-11sigwdanimation {
    animation: gwd-gen-11sigwdanimation_gwd-keyframes 0.995s linear 0.499s 1 normal forwards;
    -webkit-animation: gwd-gen-11sigwdanimation_gwd-keyframes 0.995s linear 0.499s 1 normal forwards;
    -moz-animation: gwd-gen-11sigwdanimation_gwd-keyframes 0.995s linear 0.499s 1 normal forwards;
}
.gwd-p-1b8i {
    position: absolute;
    height: 26px;
    transform-origin: 120.5px 21.5px 0px;
    -webkit-transform-origin: 120.5px 21.5px 0px;
    -moz-transform-origin: 120.5px 21.5px 0px;
    width: 265px;
    font-family: 'Roboto Slab';
    top: 188px;
    color: rgb(255, 255, 255);
    font-weight: bold;
    left: 36px;
    transform: translate3d(-169px, 0px, 0px);
    -webkit-transform: translate3d(-169px, 0px, 0px);
    -moz-transform: translate3d(-169px, 0px, 0px);
    opacity: 0;
    text-align: center;
}
@keyframes gwd-gen-68gqgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(-169px, 0px, 0px);
        -webkit-transform: translate3d(-169px, 0px, 0px);
        -moz-transform: translate3d(-169px, 0px, 0px);
        opacity: 0;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    100% {
        transform: translate3d(0px, 0px, 0px);
        -webkit-transform: translate3d(0px, 0px, 0px);
        -moz-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
}
@-webkit-keyframes gwd-gen-68gqgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(-169px, 0px, 0px);
        opacity: 0;
        -webkit-animation-timing-function: linear;
    }
    100% {
        -webkit-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        -webkit-animation-timing-function: linear;
    }
}
@-moz-keyframes gwd-gen-68gqgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(-169px, 0px, 0px);
        opacity: 0;
        -moz-animation-timing-function: linear;
    }
    100% {
        -moz-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        -moz-animation-timing-function: linear;
    }
}
#page1.gwd-play-animation .gwd-gen-68gqgwdanimation {
    animation: gwd-gen-68gqgwdanimation_gwd-keyframes 0.5s linear 1.5s 1 normal forwards;
    -webkit-animation: gwd-gen-68gqgwdanimation_gwd-keyframes 0.5s linear 1.5s 1 normal forwards;
    -moz-animation: gwd-gen-68gqgwdanimation_gwd-keyframes 0.5s linear 1.5s 1 normal forwards;
}
.gwd-div-rsr5 {
    position: absolute;
    border-color: transparent;
    border-image-source: none;
    top: 231px;
    width: 132px;
    height: 35px;
    transform-origin: 66px 17.5px 0px;
    -webkit-transform-origin: 66px 17.5px 0px;
    -moz-transform-origin: 66px 17.5px 0px;
    left: 102px;
    transform: translate3d(173px, 0px, 0px);
    -webkit-transform: translate3d(173px, 0px, 0px);
    -moz-transform: translate3d(173px, 0px, 0px);
    opacity: 0;
    background-image: none;
    background-color: rgb(255, 255, 255);
}
.gwd-p-68jl {
    position: absolute;
    width: 95px;
    text-align: center;
    font-family: 'Roboto Slab';
    font-weight: bold;
    font-size: 14px;
    height: 18px;
    transform-origin: 26.5px 11.25px 0px;
    -webkit-transform-origin: 26.5px 11.25px 0px;
    -moz-transform-origin: 26.5px 11.25px 0px;
    top: 239px;
    left: 121px;
    transform: translate3d(173px, 0px, 0px);
    -webkit-transform: translate3d(173px, 0px, 0px);
    -moz-transform: translate3d(173px, 0px, 0px);
    opacity: 0;
}
.gwd-taparea-17mz {
    position: absolute;
    width: 132px;
    height: 35px;
    transform-origin: 66px 17.5px 0px;
    -webkit-transform-origin: 66px 17.5px 0px;
    -moz-transform-origin: 66px 17.5px 0px;
    top: 231px;
    left: 102px;
    transform: translate3d(173px, 0px, 0px);
    -webkit-transform: translate3d(173px, 0px, 0px);
    -moz-transform: translate3d(173px, 0px, 0px);
    opacity: 0;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
}
@keyframes gwd-gen-1ephgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(173px, 0px, 0px);
        -webkit-transform: translate3d(173px, 0px, 0px);
        -moz-transform: translate3d(173px, 0px, 0px);
        opacity: 0;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    99.8% {
        transform: translate3d(0px, 0px, 0px);
        -webkit-transform: translate3d(0px, 0px, 0px);
        -moz-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    100% {
        transform: translate3d(-1px, 0px, 0px);
        -webkit-transform: translate3d(-1px, 0px, 0px);
        -moz-transform: translate3d(-1px, 0px, 0px);
        opacity: 0;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
}
@-webkit-keyframes gwd-gen-1ephgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(173px, 0px, 0px);
        opacity: 0;
        -webkit-animation-timing-function: linear;
    }
    99.8% {
        -webkit-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        -webkit-animation-timing-function: linear;
    }
    100% {
        -webkit-transform: translate3d(-1px, 0px, 0px);
        opacity: 0;
        -webkit-animation-timing-function: linear;
    }
}
@-moz-keyframes gwd-gen-1ephgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(173px, 0px, 0px);
        opacity: 0;
        -moz-animation-timing-function: linear;
    }
    99.8% {
        -moz-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        -moz-animation-timing-function: linear;
    }
    100% {
        -moz-transform: translate3d(-1px, 0px, 0px);
        opacity: 0;
        -moz-animation-timing-function: linear;
    }
}
#page1.gwd-play-animation .gwd-gen-1ephgwdanimation {
    animation: gwd-gen-1ephgwdanimation_gwd-keyframes 0.501s linear 2s 1 normal forwards;
    -webkit-animation: gwd-gen-1ephgwdanimation_gwd-keyframes 0.501s linear 2s 1 normal forwards;
    -moz-animation: gwd-gen-1ephgwdanimation_gwd-keyframes 0.501s linear 2s 1 normal forwards;
}
@keyframes gwd-gen-x7f5gwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(173px, 0px, 0px);
        -webkit-transform: translate3d(173px, 0px, 0px);
        -moz-transform: translate3d(173px, 0px, 0px);
        opacity: 0;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    100% {
        transform: translate3d(0px, 0px, 0px);
        -webkit-transform: translate3d(0px, 0px, 0px);
        -moz-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
}
@-webkit-keyframes gwd-gen-x7f5gwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(173px, 0px, 0px);
        opacity: 0;
        -webkit-animation-timing-function: linear;
    }
    100% {
        -webkit-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        -webkit-animation-timing-function: linear;
    }
}
@-moz-keyframes gwd-gen-x7f5gwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(173px, 0px, 0px);
        opacity: 0;
        -moz-animation-timing-function: linear;
    }
    100% {
        -moz-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        -moz-animation-timing-function: linear;
    }
}
#page1.gwd-play-animation .gwd-gen-x7f5gwdanimation {
    animation: gwd-gen-x7f5gwdanimation_gwd-keyframes 0.5s linear 2s 1 normal forwards;
    -webkit-animation: gwd-gen-x7f5gwdanimation_gwd-keyframes 0.5s linear 2s 1 normal forwards;
    -moz-animation: gwd-gen-x7f5gwdanimation_gwd-keyframes 0.5s linear 2s 1 normal forwards;
}
@keyframes gwd-gen-xiylgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(173px, 0px, 0px);
        -webkit-transform: translate3d(173px, 0px, 0px);
        -moz-transform: translate3d(173px, 0px, 0px);
        opacity: 0;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
    100% {
        transform: translate3d(0px, 0px, 0px);
        -webkit-transform: translate3d(0px, 0px, 0px);
        -moz-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }
}
@-webkit-keyframes gwd-gen-xiylgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(173px, 0px, 0px);
        opacity: 0;
        -webkit-animation-timing-function: linear;
    }
    100% {
        -webkit-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        -webkit-animation-timing-function: linear;
    }
}
@-moz-keyframes gwd-gen-xiylgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(173px, 0px, 0px);
        opacity: 0;
        -moz-animation-timing-function: linear;
    }
    100% {
        -moz-transform: translate3d(0px, 0px, 0px);
        opacity: 1;
        -moz-animation-timing-function: linear;
    }
}
#page1.gwd-play-animation .gwd-gen-xiylgwdanimation {
    animation: gwd-gen-xiylgwdanimation_gwd-keyframes 0.5s linear 2s 1 normal forwards;
    -webkit-animation: gwd-gen-xiylgwdanimation_gwd-keyframes 0.5s linear 2s 1 normal forwards;
    -moz-animation: gwd-gen-xiylgwdanimation_gwd-keyframes 0.5s linear 2s 1 normal forwards;
}</style>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'><script data-source='googbase_min.js' data-version='3' data-exports-type='googbase' src='".$path."/googbase_min.js'></script>
  <script data-source='gwd_webcomponents_min.js' data-version='5' data-exports-type='gwd_webcomponents' src='".$path."/gwd_webcomponents_min.js'></script>
  <script data-source='gwdpage_min.js' data-version='8' data-exports-type='gwd-page' src='".$path."/gwdpage_min.js'></script>
  <script data-source='gwdpagedeck_min.js' data-version='9' data-exports-type='gwd-pagedeck' src='".$path."/gwdpagedeck_min.js'></script>
  <script data-source='https://s0.2mdn.net/ads/studio/Enabler.js' data-exports-type='gwd-doubleclick' src='https://s0.2mdn.net/ads/studio/Enabler.js'></script>
  <script data-source='gwddoubleclick_min.js' data-version='14' data-exports-type='gwd-doubleclick' src='".$path."/gwddoubleclick_min.js'></script>
  <script data-source='gwdimage_min.js' data-version='9' data-exports-type='gwd-image' src='".$path."/gwdimage_min.js'></script>
  <script data-source='gwdtaparea_min.js' data-version='4' data-exports-type='gwd-taparea' src='".$path."/gwdtaparea_min.js'></script>
  <script type='text/javascript' gwd-events='support' src='".$path."/gwd-events-support.1.0.js'></script>
  <script type='text/javascript' gwd-events='handlers'>
    gwd.auto_Gwd_taparea_1Click = function(event) {
      // GWD Predefined Function
      gwd.actions.gwdDoubleclick.exitOverride('gwd-ad', 'ClickTAB', 'https://www.youtube.com/watch?v=aY7TFBDK_iw', true, true);
    };
    gwd.auto_Gwd_taparea_1Click1 = function(event) {
      // GWD Predefined Function
      gwd.actions.gwdDoubleclick.exitOverride('gwd-ad', 'ClickTAB_1', 'https://www.youtube.com/watch?v=aY7TFBDK_iw', true, true);
    };
  </script>
  <script type='text/javascript' gwd-events='registration'>
    // Support code for event handling in Google Web Designer
     // This script block is auto-generated. Please do not edit!
    gwd.actions.events.registerEventHandlers = function(event) {
      gwd.actions.events.addHandler('gwd-taparea_1', 'click', gwd.auto_Gwd_taparea_1Click, false);
      gwd.actions.events.addHandler('gwd-taparea_1', 'click', gwd.auto_Gwd_taparea_1Click1, false);
    };
    gwd.actions.events.deregisterEventHandlers = function(event) {
      gwd.actions.events.removeHandler('gwd-taparea_1', 'click', gwd.auto_Gwd_taparea_1Click, false);
      gwd.actions.events.removeHandler('gwd-taparea_1', 'click', gwd.auto_Gwd_taparea_1Click1, false);
    };
    document.addEventListener('DOMContentLoaded', gwd.actions.events.registerEventHandlers);
    document.addEventListener('unload', gwd.actions.events.deregisterEventHandlers);
  </script>
  <gwd-doubleclick id='gwd-ad'>
    <gwd-metric-configuration>
      <gwd-metric-event source='gwd-taparea_1' event='tapareaexit' metric='' exit='Exit'></gwd-metric-event>
    </gwd-metric-configuration>
    <div is='gwd-pagedeck' class='gwd-page-container' id='pagedeck'>
      <div is='gwd-page' id='page1' class='gwd-page-wrapper gwd-page-size gwd-lightbox' data-gwd-width='336px' data-gwd-height='280px'>
        <div class='gwd-page-content gwd-page-size'>
          <img is='gwd-image' source='".$path."/bg.png' id='gwd-image_1' class='gwd-img-1igv gwd-gen-lfplgwdanimation'>
          <img is='gwd-image' source='".$path."/logo.png' id='gwd-image_2' class='gwd-img-1t76 gwd-gen-11sigwdanimation'>
          <p class='gwd-p-1b8i gwd-gen-68gqgwdanimation'>Web Designer. Designer Interfaces</p>
          <div class='gwd-div-rsr5 gwd-gen-xiylgwdanimation'></div>
          <p class='gwd-p-68jl gwd-gen-x7f5gwdanimation'>View more</p>
          <gwd-taparea id='gwd-taparea_1' class='gwd-taparea-17mz gwd-gen-1ephgwdanimation'></gwd-taparea>
        </div>
      </div>
    </div>
    <gwd-exit metric='ClickTAB' url='https://www.youtube.com/watch?v=aY7TFBDK_iw'></gwd-exit>
    <gwd-exit metric='ClickTAB_1' url='https://www.youtube.com/watch?v=aY7TFBDK_iw'></gwd-exit>
  </gwd-doubleclick>
  <script type='text/javascript' id='gwd-init-code'>
    (function() {
      var gwdAd = document.getElementById('gwd-ad');

      /**
       * Handles the DOMContentLoaded event. The DOMContentLoaded event is
       * fired when the document has been completely loaded and parsed.
       */
      function handleDomContentLoaded(event) {

      }

      /**
       * Handles the WebComponentsReady event. This event is fired when all
       * custom elements have been registered and upgraded.
       */
      function handleWebComponentsReady(event) {
        // Start the Ad lifecycle.
        setTimeout(function() {
          gwdAd.initAd();
        }, 0);
      }

      /**
       * Handles the event that is dispatched after the Ad has been
       * initialized and before the default page of the Ad is shown.
       */
      function handleAdInitialized(event) {}

      window.addEventListener('DOMContentLoaded',
        handleDomContentLoaded, false);
      window.addEventListener('WebComponentsReady',
        handleWebComponentsReady, false);
      window.addEventListener('adinitialized',
        handleAdInitialized, false);
    })();
  </script>


<script data-exports-type='dclk-quick-preview'>studio.Enabler.setRushSimulatedLocalEvents(true);</script><script data-exports-type='gwd-studio-registration'>function StudioExports() {
Enabler.exit('ClickTAB', 'https://www.youtube.com/watch?v=aY7TFBDK_iw');
Enabler.exit('ClickTAB_1', 'https://www.youtube.com/watch?v=aY7TFBDK_iw');
}</script><script type='text/gwd-admetadata'>{'version':1,'type':'DoubleClick','format':'','template':'Banner 3.0.0','politeload':false,'fullscreen':false,'counters':[],'timers':[],'exits':[{'exitId':'ClickTAB','url':'https://www.youtube.com/watch?v=aY7TFBDK_iw'},{'exitId':'ClickTAB_1','url':'https://www.youtube.com/watch?v=aY7TFBDK_iw'}],'creativeProperties':{'minWidth':336,'minHeight':280,'maxWidth':336,'maxHeight':280},'components':['gwd-doubleclick','gwd-image','gwd-page','gwd-pagedeck','gwd-taparea'],'responsive':false}</script></div>";
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );



//Return path to plugin directory (url/path)
function wp125_get_plugin_dir($type) {
  if ( !defined('WP_CONTENT_URL') )
    define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
  if ( !defined('WP_CONTENT_DIR') )
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
  if ($type=='path') { return WP_CONTENT_DIR.'/plugins/'.plugin_basename(dirname(__FILE__)); }
  else { return WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)); }
}
?>