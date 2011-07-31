<?php

   defined('C5_EXECUTE') or die(_("Access Denied."));
   $this->inc('elements/header.php');

?>
<div id="page">

   <div id="centering-wrapper">
      <div id="head">

         <div class="search">
         <?php
            $suche = new Area('Suche');
            $suche->setBlockLimit(1);
            $suche->display($c);
         ?>
         </div>

         <?php
            $navigation = new Area('Navigation');
            $navigation->setBlockLimit(1);
            $navigation->display($c);
         ?>

      </div>

      <div id="content">
            <div class="sidebar">
               <?php
                     $sidebar = new Area('Seitenleiste');
                     $sidebar->display($c);
               ?>
            </div>
            <div class="main">
                  <?php
                        $main_content = new Area('Hauptbereich');
                        $main_content->display($c);
                  ?>
            </div>
            <div style="clear: both">&nbsp;</div>
      </div>

      <div id="foot">
         <?php
            $footer = new Area('Fußleiste');
            $footer->display($c);
         ?>
      </div>
   </div>

</div>
<?php

   $this->inc('elements/footer.php');

?>