<?php 
defined('C5_EXECUTE') or die(_("Access Denied.")); 
 

$controller->nextLabel=t('Next');
$controller->previousLabel=t('Previous');
$controller->showArrows=1;
$controller->loopSequence=1;

include($this->getBlockPath() .'/form_setup_html.php');  
?>