<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));  
$ih = Loader::helper('image');
$nh = Loader::helper('navigation');
?> 
	
<div id="tonyNextPrevious<?php echo intval($bID)?>" class="tonyNextPreviousWrap">
	<?php  if( is_object($nextCollection) ){ ?> 
    <div class="tonyNextPrevious_nextLink">
        <a href="<?php echo $nh->getCollectionURL($nextCollection) ?>"><?php echo $nextLinkText ?></a>
    </div>
    <?php  } ?>
    
    <?php  if( is_object($previousCollection) ){ ?>
    <div class="tonyNextPrevious_previousLink">
        <a href="<?php echo $nh->getCollectionURL($previousCollection) ?>"><?php echo $previousLinkText ?></a>  
    </div>
    <?php  } ?>
    
    <div class="spacer"></div> 
</div>