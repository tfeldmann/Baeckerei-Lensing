<?php    
defined('C5_EXECUTE') or die(_("Access Denied."));

class VimeoBlockController extends BlockController {

	var $pobj;

	protected $btTable = 'btVimeo';
	protected $btInterfaceWidth = "400";
	protected $btInterfaceHeight = "370";
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = 300;

	public $title = '';
	public $videoURL = '';
	public $previewText = '';
	public $videoWidth = '400';
	public $videoHeight = '300';

		/**
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
	public function getBlockTypeDescription() {
		return t("Embeds a Vimeo Player in your web page.");
	}

	public function getBlockTypeName() {
		return t("Vimeo Player");
	}

	public function getJavaScriptStrings() {
		return array('vimeo-required' => t('Please enter a valid Vimeo URL. Sample: %s or %s', 'http://www.vimeo.com/1234567', 'http://vimeo.com/1234567'));
	}

	function view(){
		global $c;
		$this->set('bID', $this->bID);
		$this->set('title', $this->title);
		$this->set('videoURL', $this->videoURL);
		$haveVideoId = 0;
		$videoID = str_replace("http://www.vimeo.com/","",$this->videoURL);
		if (intval($videoID)>0){
			$haveVideoID = 1;
			$this->set('videoID', $videoID);
		} else {
			$videoID = str_replace("http://vimeo.com/", "", $this->videoURL);
			if (intval($videoID)>0){
				$haveVideoID = 1;
				$this->set('videoID', $videoID);
			}
		}
		$this->set('haveVideoID', $haveVideoID);
		$this->set('previewText', $this->previewText);
		$this->set('videoWidth', $this->videoWidth);
		$this->set('videoHeight', $this->videoHeight);
	}

	public function save($data) {
		$txt = Loader::helper('text');
		$args['title'] = isset($data['title']) ? trim($data['title']) : '';
		$args['videoURL'] = isset($data['videoURL']) ? trim($data['videoURL']) : '';
		$args['previewText'] = isset($data['previewText']) ? $txt->makenice($data['previewText']) : '';
		$args['videoWidth'] = isset($data['videoWidth']) ? trim($data['videoWidth']) : '';
		$args['videoHeight'] = isset($data['videoHeight']) ? trim($data['videoHeight']) : '';
		parent::save($args);
	}
}
?>