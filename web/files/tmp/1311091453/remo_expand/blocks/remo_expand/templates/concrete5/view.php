<div class="ccm-remo-expand">
<?php     
	defined('C5_EXECUTE') or die(_("Access Denied."));
	global $c;

  $className = 'ccm-remo-expand-open';
  $contentCss = '';
  if ($controller->state == 1) {
    $className = 'ccm-remo-expand-closed'; 
    $contentCss = ' style="display:none;" ';   
  }

	echo '<a href="" id="ccm-remo-expand-title-'.$bID.'" class="ccm-remo-expand-title '.$className.'"><span class="ccm-background"><span class="ccm-icon">' . $controller->title . '</span></span></a>';
	echo '<div id="ccm-remo-expand-content-'.$bID.'" class="ccm-remo-expand-content"'.$contentCss.'>';
	$content = $controller->getContent();
	
	echo $content;
	echo '</div>';	
	
?>
</div>