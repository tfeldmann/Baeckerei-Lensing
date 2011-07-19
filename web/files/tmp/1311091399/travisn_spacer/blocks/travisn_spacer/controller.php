<?php  
/*
 * tnSpacer Package written by Tavis Nickels (c) 2009.
 *
 * This code is released under the MIT Licence. 
 *
 * THE SOFTWARE IS PROVIDED ÒAS ISÓ, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR 
 * PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE 
 * FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, 
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 *
 * See licence files for details
 *
 */

defined('C5_EXECUTE') or die(_("Access Denied."));

class TravisnSpacerBlockController extends BlockController {
	protected $btTable = 'btTravisnSpacer';
	protected $btInterfaceWidth = "400";
	protected $btInterfaceHeight = "90"; 

	public function getBlockTypeDescription() {
		return t("Add spacers to your webpage without editing code.");
	}
		
	public function getBlockTypeName() {
		return t("tnSpacer");
	}
	
	function save($data) { 
		$args['spacerHeight'] = isset($data['spacerHeight']) ? str_replace(' ', '', $data['spacerHeight']) : '0';
		parent::save($args);
	}		
	
	public function delete() {
		parent::delete();
	}
	
	public function on_page_view() {
		$html = Loader::helper('html');
		$this->addHeaderItem($html->css('ccm.tnspacer.css', 'travisn_spacer'));
	}
}