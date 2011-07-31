<?php     defined('C5_EXECUTE') or die(_("Access Denied.")); ?>

<style type="text/css" media="all">

.AmiantImageGalleryBlock<?php   echo $bID?>{
	position: relative;
	margin: 0 auto;
}

.AmiantImageGallery<?php   echo $bID?>{
	width: <?php   echo $width?>px;
	height: <?php   echo $height+25;?>px;
	text-align: center;
}

.AmiantImageGalleryThumbnailContainerWrapper<?php   echo $bID?> {
	width: <?php   echo $maxThumbnailWidth?>px;
	height: <?php   echo $maxThumbnailHeight?>px;
	float: left;
	margin: 10px;
	position: relative;
}

.AmiantImageGalleryThumbnailContainer<?php   echo $bID?> {
	width: 100%;
	height: <?php   echo $maxThumbnailHeight?>px;
	background-color: #EEEEEE;
	border: 1px solid #CCCCCC;
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	padding: 5px;
	position: relative;
}

.AmiantImageGalleryThumbnailContainer<?php   echo $bID?>:hover {
	background-color: #DDDDDD;
	border: 1px solid #BBBBBB;
	border-radius: 7px;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	/*opacity: 0.7;*/
}

.AmiantImageGalleryThumbnailContainerLoading<?php   echo $bID?> {
	background-image: url('<?php   echo $this->getBlockURL()."/images/ajax-loader.gif"; ?>');
	background-position: center center;
	background-repeat: no-repeat;
}

.AmiantImageGalleryThumbnailContainerError<?php   echo $bID?> {
	background-image: url('<?php   echo $this->getBlockURL()."/images/error.png"; ?>');
	background-position: center center;
	background-repeat: no-repeat;
}

.AmiantImageGalleryThumbnail<?php   echo $bID?> {
	margin: 0 auto;
	position: relative;
	top: 50%;
}

.AmiantImageGalleryThumbnailContainer<?php   echo $bID?> .AmiantImageGalleryThumbnailLink {
	border: none;
	text-decoration: none;
}

.AmiantImageGalleryBlockControlBar<?php   echo $bID?> {
	height: 30px;
	background: #EEEEEE;
	-moz-border-radius: 7px;
	-webkit-border-radius: 7px;
	border-radius: 7px;
	padding: 3px;
	clear: both;
}

.AmiantImageGalleryBlockFileInfo {
	width: 100%;
	border-top: 1px dotted #CCCCCC;
	margin-top: 10px;
	padding: 5px;
	text-align: left;
}

.AmiantImageGalleryBlockFileInfoNoCaption {
	width: 100%;
	padding: 5px;
	text-align: left;
}

.AmiantImageGalleryBlockPopup {
    position: absolute;
    border-collapse: collapse;
	padding: 0px;
	margin: 0px;
	border-spacing: 0px;
    display: none; /* keeps the popup hidden if no JS available */
}

.AmiantImageGalleryBlockPopup td.top_left {
	width: 15px;
	height: 20px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_top_left_corner_arrow.png"; ?>') bottom right no-repeat;
}

.AmiantImageGalleryBlockPopup td.top_left_small {
	width: 50px;
	height: 20px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_top.png"; ?>') bottom right repeat-x;
}

.AmiantImageGalleryBlockPopup td.top_right {
	width: 17px;
	height: 20px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_top_right_corner.png"; ?>') bottom left no-repeat;
}

.AmiantImageGalleryBlockPopup td.top_center {
	width: 26px;
	height: 20px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_top_arrow.png"; ?>') bottom left no-repeat;
}

.AmiantImageGalleryBlockPopup td.top {
	height: 20px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_top.png"; ?>') bottom left repeat-x;
}

.AmiantImageGalleryBlockPopup td.left {
	width: 15px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_left.png"; ?>') top right repeat-y;
}

.AmiantImageGalleryBlockPopup td.right {
	width: 17px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_right.png"; ?>') repeat-y;
}

.AmiantImageGalleryBlockPopup td.center {
	padding: 0px;
	background: #FFFFFF;
	text-align: center;
	font-weight: normal;
	font-size: 10px;
	color: #333333;
}

.AmiantImageGalleryBlockPopup td.bottom_left {
	width: 15px;
	height: 17px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_bottom_left_corner.png"; ?>') top right no-repeat;
}

.AmiantImageGalleryBlockPopup td.bottom_right {
	width: 17px;
	height: 17px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_bottom_right_corner.png"; ?>') no-repeat; 
}

.AmiantImageGalleryBlockPopup td.bottom {
	height: 17px;
	background: url('<?php   echo $this->getBlockURL()."/images/popup_bubble_bottom.png"; ?>') repeat-x;
}

#AmiantImageGallerySlidesWrapper<?php   echo $bID?> {
	width: <?php   echo $width?>px;
	height: <?php   echo $height?>px;
	text-align: center;
}

.AmiantImageGallerySlidesWrapper<?php   echo $bID?> {
	
}

.AmiantImageGallerySlide<?php   echo $bID?> {
	width: <?php   echo $width?>px;
	height: <?php   echo $height?>px;
	text-align: center;
}

.AmiantImageGallerySlideInfo<?php   echo $bID?> {
	width: 100%;
	background: black;
	opacity: 0.7;
	position: absolute;
	z-index: 1500;
	bottom: 0px;
	color: #FFFFFF;
	text-align: left;
	padding: 10px;
}

.AmiantImageGallerySlideControllsWrapper<?php   echo $bID?> {
	float: right;
}

.AmiantImageGallerySlideControllPrev<?php   echo $bID?> {
	font-weight: bold;
	color: green;
	cursor: pointer;
}

.AmiantImageGallerySlideControllNext<?php   echo $bID?> {
	font-weight: bold;
	color: green;
	cursor: pointer;
}

#AmiantImageGalleryImagesLoadingWaiter<?php   echo $bID?> {
	display: block;
	width: 16px;
	height: 16px;
	padding: 0px;
	margin-left: 10px;
	float: left;
}

.ig_pagination {clear: both; padding: 5px;}
.ig_pagination_controls {float: right;}

.ig_pageLeft {}
.ig_pageRight {}
.ig_pager {}

#zoom-mode-image-title {
	padding: 10px;
}
	
</style>
