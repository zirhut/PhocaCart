<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();
use Joomla\CMS\Language\Text;
use Joomla\CMS\Factory;


$r 			=  $this->r;
$js ='
Joomla.submitbutton = function(task) {
	if (task == "'. $this->t['task'] .'.cancel" || document.formvalidator.isValid(document.getElementById("adminForm"))) {
		Joomla.submitform(task, document.getElementById("adminForm"));
	} else {
		Joomla.renderMessages({"error": ["'. Text::_('JGLOBAL_VALIDATION_FORM_FAILED', true).'"]});
	}
}
';
JFactory::getDocument()->addScriptDeclaration($js);
echo $r->startForm($this->t['o'], $this->t['task'], $this->item->id, 'adminForm', 'adminForm');
// First Column
echo '<div class="col-xs-12 col-sm-12 col-md-12 form-horizontal">';
$tabs = array (
'general' 		=> Text::_($this->t['l'].'_GENERAL_OPTIONS'),
'publishing' 	=> Text::_($this->t['l'].'_PUBLISHING_OPTIONS'));
echo $r->navigation($tabs);

$formArray = array ('title');
echo $r->groupHeader($this->form, $formArray);

echo $r->startTabs();

echo $r->startTab('general', $tabs['general'], 'active');

$translatedLabel = $this->form->getValue('label') ? '<small>('.Text::_($this->form->getValue('label')).')</small>' : '';
echo $r->item($this->form, 'label', $translatedLabel, 1);

$translatedDesc = $this->form->getValue('description') ? '<small>('.Text::_($this->form->getValue('description')).')</small>' : '';
echo $r->item($this->form, 'description', $translatedDesc, 1);

$formArray = array ('type', 'predefined_values', 'predefined_values_first_option', 'default', 'class', 'required', 'read_only', 'pattern', 'maxlength', /*'additional',*/ 'validate', 'unique', 'ordering', 'access', 'group');
echo $r->group($this->form, $formArray);
echo $r->endTab();

echo $r->startTab('publishing', $tabs['publishing']);
foreach($this->form->getFieldset('publish') as $field) {
	echo '<div class="control-group">';
	if (!$field->hidden) {
		echo '<div class="control-label">'.$field->label.'</div>';
	}
	echo '<div class="controls">';
	echo $field->input;
	echo '</div></div>';
}
echo $r->endTab();

echo $r->endTabs();
echo '</div>';//end span10
// Second Column
//echo '<div class="col-xs-12 col-sm-2 col-md-2"></div>';//end span2
echo $r->formInputs();
echo $r->endForm();
?>

