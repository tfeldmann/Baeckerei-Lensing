<?php    

defined('C5_EXECUTE') or die(_("Access Denied."));

class TravisnSpacerPackage extends Package {

	protected $pkgHandle = 'travisn_spacer';
	protected $appVersionRequired = '5.2.0';
	protected $pkgVersion = '1.2';
	
	public function getPackageDescription() {
		return t("Add spacers to your webpage without editing code.");
	}
	
	public function getPackageName() {
		return t("tnSpacer");
	}
	
	public function install() {
		$pkg = parent::install();
		// install block		
		BlockType::installBlockTypeFromPackage('travisn_spacer', $pkg);
	}

}