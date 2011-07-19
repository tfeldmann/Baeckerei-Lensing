<?php    defined('C5_EXECUTE') or die(_("Access Denied.")); ?> 
<div id="asmillerGalleryBlock-fsRow" class="asmillerGalleryBlock-fsRow" >
	<div class="backgroundRow" style="padding-left: 100px">
		<strong>File Set:</strong> <span class="asmiller-file-set-pick-cb"><?php   echo $form->select('fsID', $fsInfo['fileSets'], $fsInfo['fsID'])?></span>
	</div>
</div>
