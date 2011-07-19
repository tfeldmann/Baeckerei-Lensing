<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

class JbParentlinkPackage extends Package {

	protected $pkgHandle = 'jb_parentlink';
	protected $appVersionRequired = '5.3.3.1';
	protected $pkgVersion = '1.0';

	public function getPackageDescription() {
		return t('Add link back to parent page.');
	}

	public function getPackageName() {
		return t('Parent Link');
	}

	public function install() {
		$pkg = parent::install();

		// install block
		BlockType::installBlockTypeFromPackage('jb_parentlink', $pkg);

	}

}