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

?>

<style>
table#tnSpacerSetup th {font-weight: bold; text-style: normal; padding-right: 8px; white-space: nowrap; vertical-align:top ; padding-bottom:8px}
table#tnSpacerSetup td{ font-size:12px; vertical-align:top; padding-bottom:8px;}
</style> 

<table id="tnSpacerSetup" style="width:100%"> 
	<tr>
		<th><?php  echo t('Spacer Height:')?></th>
		<td>
			<input type="text" style="width:250px" name="spacerHeight" id="spacerHeight" value="<?php  echo  $spObj->spacerHeight ?>"/>
		</td>
	</tr>
</table>
<div class="ccm-field" style="margin-bottom:3px; margin-top:4px;">
	<?php  echo t('Enter the height of the spacer. You can enter the units, or px will be used by default.')?>
</div>