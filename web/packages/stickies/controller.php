<?php    

defined('C5_EXECUTE') or die(_("Access Denied."));

class StickiesPackage extends Package {

	protected $pkgHandle = 'stickies';
	protected $appVersionRequired = '5.1';
	protected $pkgVersion = '1.2.3';
	
	public function getPackageDescription() {
		return t("Adds notes which are visible only when editing the page.");
	}
	
	public function getPackageName() {
		return t("Stickies");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('stickies', $pkg);
		
	}
	

}