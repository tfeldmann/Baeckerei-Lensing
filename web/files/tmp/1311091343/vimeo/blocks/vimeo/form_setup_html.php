<?php     defined('C5_EXECUTE') or die(_("Access Denied.")); ?> 
<style>
	table#videoBlockSetup th {font-weight: bold; text-style: normal; padding-right: 8px; white-space: nowrap; vertical-align:top ; padding-bottom:8px}
	table#videoBlockSetup td{ font-size:12px; vertical-align:top; padding-bottom:8px;}
	table#videoBlockSetup .note{ font-size:10px; color:#999999; font-weight:normal }
</style>
<table id="videoBlockSetup" style="width:100%"> 
	<tr>
		<th><?php    echo t('Title')?></th>
		<td><input type="text" style="width: 230px" name="title" value="<?php    echo $bObj->title?>"/></td>
	</tr>
	<tr>
		<th><?php    echo t('URL')?></th>
		<td>
			<input type="text" style="width: 230px" id="videoURL" name="videoURL" value="<?php    echo $bObj->videoURL?>" />
		</td>
	</tr>
	<tr>
		<th><?php    echo t('Preview Text')?></th>
		<td>
			<textarea id="previewText" name="previewText" style="width: 230px; height: 150px;"><?php    echo $bObj->previewText?></textarea>
		</td>
	</tr>
	<tr>
		<th><?php    echo t('Width')?></th>
		<td>
			<input type="text" style="width: 230px" id="videoWidth" name="videoWidth" value="<?php    echo $bObj->videoWidth?>" />
		</td>
	</tr>
	<tr>
		<th><?php    echo t('Height')?></th>
		<td>
			<input type="text" style="width: 230px" id="videoHeight" name="videoHeight" value="<?php    echo $bObj->videoHeight?>" />
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<?php   echo t('Standard player size on vimeo.com is 640x360, standard embed code is 400x300.');?>
		</td>
	</tr>
</table>