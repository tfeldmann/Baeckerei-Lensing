<?php    
defined('C5_EXECUTE') or die(_("Access Denied."));
$c = Page::getCurrentPage();
$playerID = uniqid();
?>
<div id="vimeo-area-<?php    echo $playerID;?>" class="vimeo-area">
	<?php   if (strlen($title)>0){?><h2><?php    echo $title; ?></h2><?php   } ?>
	<?php   if (strlen($previewText)>0){?><p><?php    echo $previewText; ?></p><?php   } ?>
<?php    if ($c->isEditMode()) { ?>
	<div class="ccm-edit-mode-disabled-item" style="width:<?php    echo $videoWidth?>px; height:<?php    echo $videoHeight?>px;">
		<div style="padding:8px 0px; padding-top: <?php    echo round($videoHeight/2)-10;?>px;"><?php    echo t('Content disabled in edit mode.')?></div>
	</div>
<?php     }else{ ?>
	<div id="vimeo-player-<?php    echo $playerID;?>" class="vimeo-player">
		<?php   if ($haveVideoID){?>
		<object width="<?php    echo $videoWidth;?>" height="<?php    echo $videoHeight ;?>"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<?php    echo $videoID;?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" /><param NAME="wmode" VALUE="transparent"><embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php    echo $videoID;?>&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="<?php    echo $videoWidth;?>" height="<?php    echo $videoHeight;?>" wmode="transparent"></embed></object>
		<?php   } else { ?>
		<div class="ccm-edit-mode-disabled-item" style="width:<?php    echo $videoWidth?>px; height:<?php    echo $videoHeight?>px;">
			<div style="padding:8px 0px; padding-top: <?php    echo round($videoHeight/2)-10?>px;"><?php   echo t('Could not determine video ID, Vimeo URL was not parseable.');?></div>
		</div>
		<?php   } ?>
	</div>
<?php     } ?>
</div>