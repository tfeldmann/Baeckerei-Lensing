<?php   
	
	defined('C5_EXECUTE') or die(_("Access Denied."));
	
	$form = Loader::helper('form');
	
	$comments = $controller -> comments;
	$color = $controller -> color;
	
?>

<style>
table.commentsBlockSetup {margin-top:16px}
table.commentsBlockSetup th {font-weight: bold; text-style: normal; padding-right: 8px; white-space: nowrap; vertical-align: center ; padding-bottom:8px}
table.commentsBlockSetup td{ font-weight: bold; text-style: normal; padding-right: 8px; white-space: nowrap; vertical-align: center ; padding-bottom:8px}
table.commentsBlockSetup .note{ font-size:10px; color:#999999; font-weight:normal }
</style>

<div class="ccm-block-field-group">
	<h2><?php  echo t("Comments")?></h2>
	<?php  echo $form -> textarea('comments', $comments, array('style' => 'width: 290px; height: 190px')); ?>
</div>

<div class="ccm-block-field-group">
	<h2><?php  echo t("Color")?></h2>
	<?php  echo $form -> select ('color', array ('blue' => 'Blue', 'green' => 'Green', 'pink' => 'Pink', 'purple' => 'Purple', 'white' => 'White', 'yellow' => 'Yellow'), $color); ?>
</div>