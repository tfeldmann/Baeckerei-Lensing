<?php      

defined('C5_EXECUTE') or die(_("Access Denied."));

class RemoExpandPackage extends Package {

	protected $pkgHandle = 'remo_expand';
	protected $appVersionRequired = '5.3.3';
	protected $pkgVersion = '1.0.1';
	
	public function getPackageDescription() {
		return t("Expand/Collapse Content.");
	}
	
	public function getPackageName() {
		return t("Expander");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('remo_expand', $pkg);
		
	}




}