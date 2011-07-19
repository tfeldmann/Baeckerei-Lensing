<?php  
	
	defined ('C5_EXECUTE') or die (_("Access Denied."));
	global $c;
	
	if ($c -> isEditMode ()) {
		
		switch ($color) {
			
			case "blue":
				$style = 'background-color: #DEF4FF; border-color: #C5ECFF; color: #666D70;';
				break;
			
			case "green":
				$style = 'background-color: #DEFFDE; border-color: #C5FFC5; color: #667066;';
				break;
			
			case "purple":
				$style = 'background-color: #F1DEFF; border-color: #E8C5FF; color: #6C6670;';
				break;
			
			case "pink":
				$style = 'background-color: #FFDEFF; border-color: #FFC5FF; color: #706670;';
				break;
			
			case "white":
				$style = 'background-color: #F4F4F4; border-color: #E5E5E5; color: #6D6D6D;';
				break;
			
			default:
				$style = 'background-color: #FFFFDE; border-color: #FFFF9D; color: #707066;';
				break;
			
		}
		
		if (!class_exists ('Textile', false)) {
			
			require_once ('helpers/textile.php');
			
		}
		
		$textile = new Textile();
		
?>

<div class="ccm-stickies" style="<?php  echo $style; ?>">
	
	<style type="text/css">
		
		.ccm-stickies { border-style: solid; border-width: 3px 1px 1px 1px; font-family: Arial, Helvetica, sans-serif; font-size: 15px; margin: 8px 12px 20px 12px; max-width: 520px; padding: 4px 20px 8px 20px; }
		.ccm-stickies p { display: block; margin-top: 1em; margin-bottom: 1em; }
		.ccm-stickies ul { list-style-type: disc; list-style-position: outside; }
		.ccm-stickies li { display: list-item; }
		.ccm-stickies-date { border-style: dashed; border-width: 1px 0 0 0; border-color: inherit; font-size: 8px; font-style: italic; font-weight: bold; margin: 18px 0 0 0; text-align: right; padding: 5px 0 0 0; }
		
	</style>
	
	<?php  echo $textile -> TextileThis ($controller -> comments); ?>
	<p class="ccm-stickies-date"><?php  echo date('m/d/Y, g:i A', strtotime($b->getBlockDateLastModified())); ?></p>
	
</div>

<?php  } ?>