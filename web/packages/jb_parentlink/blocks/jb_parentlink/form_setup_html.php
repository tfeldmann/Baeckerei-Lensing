<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>  

<div class="ccm-block-field-group">
<?php echo t('Prefix text:')?>
<input id="ccm-jbparentlink-prefix" type="text" name="prefix" style="width:70px" value="<?php echo $prefix?>" /> eg. "Back to" or "Return to"
<BR>
<?php echo t('Suffix text:')?>
<input id="ccm-jbparentlink-suffix" type="text" name="suffix" style="width:70px" value="<?php echo $suffix?>" /> eg. "..." or " >>"
<BR>
<?php echo t('Make page name bold:')?> <input name="boldPagename" value="1" <?php  echo (intval($boldPagename)>=1)?'checked="checked"':''?> type="checkbox" />
&nbsp;&nbsp;
<?php echo t('Wrap link in DIV:')?> <input name="wrapDiv" value="1" <?php  echo (intval($wrapDiv)>=1)?'checked="checked"':''?> type="checkbox" />
		</div>
<em>How the link is built: "prefix" + "page name" + "suffix"</em><BR><BR>
Note: please include a space in the 'prefix' or 'suffix' if desired.