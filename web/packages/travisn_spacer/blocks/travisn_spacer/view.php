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

if (!preg_match('/em|px|%/', $controller->spacerHeight)) {
	$height = $controller->spacerHeight.'px';
} else {
	$height = $controller->spacerHeight;
}

?>


<div id="tnSpacer" style="height:<?php   echo $height ?>"></div>
