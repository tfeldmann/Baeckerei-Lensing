<?php    

defined('C5_EXECUTE') or die(_("Access Denied."));

class VimeoPackage extends Package {

	protected $pkgHandle = 'vimeo';
	protected $appVersionRequired = '5.2.0';
	protected $pkgVersion = '1.0.3';
	
	public function getPackageDescription() {
		return t("Embeds a Vimeo Player in your web page.");
	}
	
	public function getPackageName() {
		return t("Vimeo Player");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('vimeo', $pkg);
		
	}




}
