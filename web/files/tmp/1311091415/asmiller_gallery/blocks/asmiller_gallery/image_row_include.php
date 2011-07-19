<?php    defined('C5_EXECUTE') or die(_("Access Denied.")); ?> 
<div id="asmillerGalleryBlock-imgRow<?php   echo $imgInfo['GalleryImgId']?>" class="asmillerGalleryBlock-imgRow" >
	<div class="backgroundRow" style="background: url(<?php   echo $imgInfo['thumbPath']?>) no-repeat left top; padding-left: 100px">
		<div class="cm-GalleryBlock-imgRowIcons" >
			<div style="float:right">
				<a onclick="asmillerGalleryBlock.moveUp('<?php   echo $imgInfo['GalleryImgId']?>')" class="moveUpLink"></a>
				<a onclick="asmillerGalleryBlock.moveDown('<?php   echo $imgInfo['GalleryImgId']?>')" class="moveDownLink"></a>									  
			</div>
			<div style="margin-top:4px"><a onclick="asmillerGalleryBlock.removeImage('<?php   echo $imgInfo['GalleryImgId']?>')"><img src="<?php   echo ASSETS_URL_IMAGES?>/icons/delete_small.png" /></a></div>
		</div>
		<strong><?php   echo $imgInfo['fileName']?></strong><br/><br/>
		<div style="margin-top:4px">
		<?php   echo t('Description')?>: <input type="text" name="description[]" value="<?php   echo $imgInfo['description']?>" style="vertical-align: middle; font-size: 10px; width: 140px" />
		<input type="hidden" name="imgFIDs[]" value="<?php   echo $imgInfo['fID']?>">
		<input type="hidden" name="imgHeight[]" value="<?php   echo $imgInfo['imgHeight']?>">
		<input type="hidden" name="imgWidth[]" value="<?php  echo $imgInfo['imgWidth']?>">
		</div>
	</div>
</div>
