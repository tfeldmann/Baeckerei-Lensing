<?php    

defined('C5_EXECUTE') or die(_("Access Denied."));

class AsmillerGalleryPackage extends Package {

	protected $pkgHandle = 'asmiller_gallery'; 
	protected $appVersionRequired = '5.3.2';
	protected $pkgVersion = '2.0'; 
	
	public function getPackageName() {
		return t("Galleria image gallery"); 
	}	
	
	public function getPackageDescription() {
		return t("Easily create amazing image galleries for showcasing your work, presenting your products, or sharing your photos.");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('asmiller_gallery', $pkg);		
	}

}