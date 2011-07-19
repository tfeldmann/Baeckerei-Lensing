<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class TonyNextPreviousPackage extends Package {

	protected $pkgHandle = 'tony_next_previous';
	protected $appVersionRequired = '5.3.2';
	protected $pkgVersion = '1.01';
	
	public function getPackageDescription() { 
		return t("Navigate through sibling pages.");
	}
	
	public function getPackageName() {
		return t("Next & Previous");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('tony_next_previous', $pkg); 
	}

}