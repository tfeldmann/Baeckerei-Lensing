<?php     
	defined('C5_EXECUTE') or die(_("Access Denied."));
	class RemoExpandBlockController extends BlockController {
		
		var $pobj;
		
		protected $btTable = 'btRemoExpand';
		protected $btInterfaceWidth = "600";
		protected $btInterfaceHeight = "465";
		
		public function getBlockTypeDescription() {
			return t("Expand/Collapse Content.");
		}
		
		public function getBlockTypeName() {
			return t("Expander");
		}	
		
		public function getSpeed() {
			return $this->speed == "" ? '500' : $this->speed;
		}	
		
		
		function getContent() {
			$content = $this->translateFrom($this->content);
			return $content;				
		}
		
		public function getSearchableContent(){
			return $this->content;
		}
		
		function br2nl($str) {
			$str = str_replace("\r\n", "\n", $str);
			$str = str_replace("<br />\n", "\n", $str);
			return $str;
		}
		
		function getContentEditMode() {
			$content = $this->translateFromEditMode($this->content);
			return $content;				
		}

		function translateFromEditMode($text) {
			// old stuff. Can remove in a later version.
			$text = str_replace('href="{[CCM:BASE_URL]}', 'href="' . BASE_URL . DIR_REL, $text);
			$text = str_replace('src="{[CCM:REL_DIR_FILES_UPLOADED]}', 'src="' . BASE_URL . REL_DIR_FILES_UPLOADED, $text);

			// we have the second one below with the backslash due to a screwup in the
			// 5.1 release. Can remove in a later version.

			$text = preg_replace(
				array(
					'/{\[CCM:BASE_URL\]}/i',
					'/{CCM:BASE_URL}/i'),
				array(
					BASE_URL . DIR_REL,
					BASE_URL . DIR_REL)
				, $text);
				
			// now we add in support for the links
			
			$text = preg_replace(
				'/{CCM:CID_([0-9]+)}/i',
				BASE_URL . DIR_REL . '/' . DISPATCHER_FILENAME . '?cID=\\1',
				$text);

			// now we add in support for the files
			
			$text = preg_replace_callback(
				'/{CCM:FID_([0-9]+)}/i',
				array('RemoExpandBlockController', 'replaceFileIDInEditMode'),				
				$text);
			

			return $text;
		}
		
		function translateFrom($text) {
			// old stuff. Can remove in a later version.
			$text = str_replace('href="{[CCM:BASE_URL]}', 'href="' . BASE_URL . DIR_REL, $text);
			$text = str_replace('src="{[CCM:REL_DIR_FILES_UPLOADED]}', 'src="' . BASE_URL . REL_DIR_FILES_UPLOADED, $text);

			// we have the second one below with the backslash due to a screwup in the
			// 5.1 release. Can remove in a later version.

			$text = preg_replace(
				array(
					'/{\[CCM:BASE_URL\]}/i',
					'/{CCM:BASE_URL}/i'),
				array(
					BASE_URL . DIR_REL,
					BASE_URL . DIR_REL)
				, $text);
				
			// now we add in support for the links
			
			$text = preg_replace_callback(
				'/{CCM:CID_([0-9]+)}/i',
				array('RemoExpandBlockController', 'replaceCollectionID'),				
				$text);

			// now we add in support for the files
			
			$text = preg_replace_callback(
				'/{CCM:FID_([0-9]+)}/i',
				array('RemoExpandBlockController', 'replaceFileID'),				
				$text);
			

			return $text;
		}
		
		private function replaceFileID($match) {
			$fID = $match[1];
			if ($fID > 0) {
				$path = File::getRelativePathFromID($fID);
				return $path;
			}
		}

		private function replaceFileIDInEditMode($match) {
			$fID = $match[1];
			return View::url('/download_file', 'view_inline', $fID);
		}
		
		private function replaceCollectionID($match) {
			$cID = $match[1];
			if ($cID > 0) {
				$path = Page::getCollectionPathFromID($cID);
				if (URL_REWRITING == true) {
					$path = DIR_REL . $path;
				} else {
					$path = DIR_REL . '/' . DISPATCHER_FILENAME . $path;
				}
				return $path;
			}
		}
		
		function translateTo($text) {
			// keep links valid
			$url1 = str_replace('/', '\/', BASE_URL . DIR_REL . '/' . DISPATCHER_FILENAME);
			$url2 = str_replace('/', '\/', BASE_URL . DIR_REL);
			$url3 = View::url('/download_file', 'view_inline');
			$url3 = str_replace('/', '\/', $url3);
			$url3 = str_replace('-', '\-', $url3);
			$text = preg_replace(
				array(
					'/' . $url1 . '\?cID=([0-9]+)/i', 
					'/' . $url3 . '([0-9]+)\//i', 
					'/' . $url2 . '/i'),
				array(
					'{CCM:CID_\\1}',
					'{CCM:FID_\\1}',
					'{CCM:BASE_URL}')
				, $text);
			return $text;
		}

    /**
     * callback method used by getTemplateByDirectory
     * to filter current "." and parent ".." directory
     */              
    function filterDirectories($value)
    {
      return ($value != '..' && $value != '.');
    }
    /**
     * Backup method to get template list. getBlockObject doesn't
     * return a block if we're just adding one and therefore we
     * can't use getBlockTypeCustomTemplates.          
     */         
    function getTemplateByDirectory()
    {
      $templates = scandir(dirname(__FILE__) . '/templates');
      $templates = array_filter($templates,array($this,'filterDirectories'));
      return $templates;
    }

    /**
     * Returns all available templates for this block
     */         
    function getTemplates()
    {
      $blockObject = $this->getBlockObject();
			if (is_object($blockObject)) {
				$bt = BlockType::getByID($blockObject->getBlockTypeID());
				return $bt->getBlockTypeCustomTemplates();
			}
      return $this->getTemplateByDirectory();
    }
    
    /**
     * Currently selected template
     */         
    function getCurrentTemplate()
    {
      $blockObject = $this->getBlockObject();
      if (is_object($blockObject)) {
			 return $blockObject->getBlockFilename();
			}
			return '';
    }
   
	 function save($data) {
		 $content = $this->translateTo($data['content']);
		 $args['content'] = $content;
		 $args['state'] = $data['state'];
		 $args['title'] = $data['title'];
		 $args['speed'] = $data['speed'];
		
	    parent::save($args);
		
		 $blockObject = $this->getBlockObject();
		 if (is_object($blockObject)) {
			 $blockObject->setCustomTemplate($data['layout']);
		 }
	 }
		
    public function on_page_view() {
      $html = Loader::helper('html');
      $this->addHeaderItem('<script type="text/javascript">$(document).ready(function() {
         $(".ccm-remo-expand-title").click(function(event) {
          event.preventDefault();
          var id = $(this).attr("id");
          if ($(this).hasClass("ccm-remo-expand-open")) {
            $(this).removeClass("ccm-remo-expand-open");
            $(this).addClass("ccm-remo-expand-closed");               
          }
          else {
            $(this).addClass("ccm-remo-expand-open");
            $(this).removeClass("ccm-remo-expand-closed");  
          }
          
          var contentId = id.replace(/ccm-remo-expand-title-/,"ccm-remo-expand-content-");
          $("#"+contentId).slideToggle('. $this->getSpeed() . ');
         });
      
      });</script>');
    }		
		
	}
	
?>