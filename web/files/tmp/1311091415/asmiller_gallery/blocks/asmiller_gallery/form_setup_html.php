<?php   
defined('C5_EXECUTE') or die(_("Access Denied."));
$al = Loader::helper('concrete/asset_library');
$ah = Loader::helper('concrete/interface');
?>
<style>
#asmillerGalleryBlock-imgRows a{cursor:pointer}
#asmillerGalleryBlock-imgRows .asmillerGalleryBlock-imgRow,
#asmillerGalleryBlock-fsRow {margin-bottom:16px;clear:both;padding:7px;background-color:#eee}
#asmillerGalleryBlock-imgRows .asmillerGalleryBlock-imgRow a.moveUpLink{ display:block; background:url(<?php   echo DIR_REL?>/concrete/images/icons/arrow_up.png) no-repeat center; height:10px; width:16px; }
#asmillerGalleryBlock-imgRows .asmillerGalleryBlock-imgRow a.moveDownLink{ display:block; background:url(<?php   echo DIR_REL?>/concrete/images/icons/arrow_down.png) no-repeat center; height:10px; width:16px; }
#asmillerGalleryBlock-imgRows .asmillerGalleryBlock-imgRow a.moveUpLink:hover{background:url(<?php   echo DIR_REL?>/concrete/images/icons/arrow_up_black.png) no-repeat center;}
#asmillerGalleryBlock-imgRows .asmillerGalleryBlock-imgRow a.moveDownLink:hover{background:url(<?php   echo DIR_REL?>/concrete/images/icons/arrow_down_black.png) no-repeat center;}
#asmillerGalleryBlock-imgRows .cm-GalleryBlock-imgRowIcons{ float:right; width:35px; text-align:left; }
</style>

<div id="newImg">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">

	<tr>
	<td>
	<strong><?php   echo t('Type')?></strong>
	<select name="type" style="vertical-align: middle">
		<option value="CUSTOM"<?php    if ($type == 'CUSTOM') { ?> selected<?php    } ?>><?php   echo t('Custom Gallery')?></option>
		<option value="FILESET"<?php    if ($type == 'FILESET') { ?> selected<?php    } ?>><?php   echo t('Pictures from File Set')?></option>
	</select>
	</td>
	<td>
	<?php   echo $form->checkbox('smallThumbs', 1, $info['smallThumbs']); ?>
	<?php   echo t('Small thumbnails')?>
	</td>
	</tr>
	<tr>
		<td>
		<?php  echo $form->label('maxWidth', 'Max image width');?>
		<?php  $mh = $maxHeight!= null ? $maxHeight : "600";
			$mw = $maxWidth != null ? $maxWidth : "800"; ?>
<?php  echo $form->text('maxWidth', $mw, array('style' => 'width: 140px'));?>
		</td>
		<td>
				<?php  echo $form->label('maxHeight','Max image height');?>
<?php  echo $form->text('maxHeight', $mh, array('style' => 'width: 140px'));?>
		</td>
	</tr>
    <tr>
      <td colspan="2">
        <p>Note: Please only add one galleria gallery per page of your site.</p>
      </td>
    </tr>
	<tr style="padding-top: 2px">
	<td colspan="2">
	<br />
	<span id="asmillerGalleryBlock-chooseImg"><?php   echo $ah->button_js(t('Add Image'), 'asmillerGalleryBlock.chooseImg()', 'left');?></span>
	</td>
	</tr>

	</table>
</div>
<br/>

<div id="asmillerGalleryBlock-imgRows">
<?php    if ($fsID <= 0) {
	foreach($images as $imgInfo){ 
		$f = File::getByID($imgInfo['fID']);
		$fp = new Permissions($f);
		$imgInfo['thumbPath'] = $f->getThumbnailSRC(1);
		$imgInfo['fileName'] = $f->getTitle();
		if ($fp->canRead()) { 
			$this->inc('image_row_include.php', array('imgInfo' => $imgInfo));
		}
	}
} ?>
</div>

<?php   
Loader::model('file_set');
$s1 = FileSet::getMySets();
$sets = array();
foreach ($s1 as $s){
    $sets[$s->fsID] = $s->fsName;
}
$fsInfo['fileSets'] = $sets;

if ($fsID > 0) {
	$fsInfo['fsID'] = $fsID;
} else {
	$fsInfo['fsID']='0';
}
$this->inc('fileset_row_include.php', array('fsInfo' => $fsInfo)); ?> 

<div id="imgRowTemplateWrap" style="display:none">
<?php   
$imgInfo['GalleryImgId']='tempGalleryImgId';
$imgInfo['fID']='tempFID';
$imgInfo['fileName']='tempFilename';
$imgInfo['origfileName']='tempOrigFilename';
$imgInfo['thumbPath']='tempThumbPath';
$imgInfo['imgHeight']='tempHeight';
$imgInfo['imgWidth']='tempWidth';
$imgInfo['description']='';
$imgInfo['class']='asmillerGalleryBlock-imgRow';
?>
<?php    $this->inc('image_row_include.php', array('imgInfo' => $imgInfo)); ?> 
</div>
