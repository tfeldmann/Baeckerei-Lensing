<?php  
	
	
	defined('C5_EXECUTE') or die(_("Access Denied."));
	
	class StickiesBlockController extends BlockController {
		
		protected $btInterfaceWidth = 320;
		protected $btInterfaceHeight = 335;
		protected $btTable = 'btStickies';
		
		public $comments = "";
		public $color = "yellow";
		
		
		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Adds notes which are visible only when editing the page.");
		}
		
		public function getBlockTypeName() {
			return t("Stickies");
		}

		function save($data) { 
			$args['comments'] = $data['comments'];
			$args['color'] = $data['color'];
			
			parent::save($args);
		}
		
		
	}

?>
