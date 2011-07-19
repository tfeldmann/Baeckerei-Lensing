<?php     
defined('C5_EXECUTE') or die(_("Access Denied."));

$controllerObj = $controller;
include($this->getBlockPath() .'/form_init.php');
?>

<h2><?php     echo t('Content')?></h2>
<?php    
$replaceOnUnload = 1;
$bt->inc('editor_init.php');

?>
              
<div style="text-align: center" id="ccm-editor-pane">
<textarea id="ccm-content-<?php   echo $b->getBlockID()?>-<?php   echo $a->getAreaID()?>" class="advancedEditor ccm-advanced-editor" name="content"><?php   echo $controller->getContentEditMode()?></textarea>
</div>