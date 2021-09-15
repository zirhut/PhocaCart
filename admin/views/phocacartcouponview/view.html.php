<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );

class PhocaCartCpViewPhocacartCouponView extends JViewLegacy
{
	public function display($tpl = null) {

		$app			= JFactory::getApplication();
		$this->t		= PhocacartUtils::setVars('couponview');
		$this->r		= new PhocacartRenderAdminview();
		$id				= $app->input->get('id', 0, 'int');
		$format			= $app->input->get('format', '', 'string');

		/*$order	= new PhocacartOrderRender();
		$o = $order->render($id, $type, $format);
		echo $o;*/
		
		
		$layoutG	= new JLayoutFile('gift_voucher', null, array('component' => 'com_phocacart', 'client' => 0));
		
		$price = new PhocacartPrice();
		$gift = PhocacartCoupon::getGiftByCouponId($id);
		$d               = $gift;
		$d['typeview']   = 'Coupon';
		$d['product_id'] = $gift['gift_product_id'];

		$d['discount']   = $price->getPriceFormat($gift['discount']);
		$d['valid_from'] = JHtml::date($gift['valid_from'], JText::_('DATE_FORMAT_LC3'));
		$d['valid_to']   = JHtml::date($gift['valid_to'], JText::_('DATE_FORMAT_LC3'));
		$d['format']     = 'html';

		echo $layoutG->render($d);

		$media = new PhocacartRenderAdminmedia();

		parent::display($tpl);
	}

}
?>
