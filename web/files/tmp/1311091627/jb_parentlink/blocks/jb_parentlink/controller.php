<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

class JbParentlinkBlockController extends BlockController {

	protected $btTable = 'btJbParentlink';
	protected $btInterfaceWidth = "400";
	protected $btInterfaceHeight = "220";

	public $content = "";

	public function getBlockTypeDescription() {
		return "Add link back to parent page.";
	}

	public function getBlockTypeName() {
		return "Parent Link";
	}

	public function __construct($obj = null) {
		parent::__construct($obj);
	}

	public function view(){
		$this->set('prefix', $this->prefix);
		$this->set('suffix', $this->suffix);
		$this->set('boldPagename', $this->boldPagename);
		$this->set('wrapDiv', $this->wrapDiv);
	}

	public function save($data) {
		$args['prefix'] = isset($data['prefix']) ? $data['prefix'] : '';
		$args['suffix'] = isset($data['suffix']) ? $data['suffix'] : '';
		$args['boldPagename'] = isset($data['boldPagename']) ? $data['boldPagename'] : 0;
		$args['wrapDiv'] = isset($data['wrapDiv']) ? $data['wrapDiv'] : 0;
		parent::save($args);
	}
	
	public function buildParentLink() {
		// current page
		$c = Page::getCurrentPage();
		$parent = Page::getByID($c->getCollectionParentID());
		$parent_path = View::URL($parent->getCollectionPath());
		$parent_name = $parent->getCollectionName();
		
		if ($this->boldPagename){$parent_name = "<strong>" . $parent_name . "</strong>";} //add bolding to page name
		//if (is_null($this->prefix)==false && $this->prefix != ""){$this->prefix = $this->prefix . ' ';} //add space after
		//if (is_null($this->suffix)==false && $this->suffix != ""){$this->suffix = ' ' . $this->suffix;} //add space before
		
		$output = "<a href='" . $parent_path . "'>" . $this->prefix . $parent_name . $this->suffix . "</a>"; //build link
		if ($this->wrapDiv){$output = "<div class='jbparentlink'>" . $output . "</div>";} //wrap div tag, if selected
				
		return $output;
	}
	
}

?>