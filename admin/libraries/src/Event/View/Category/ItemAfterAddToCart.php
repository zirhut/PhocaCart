<?php
namespace Phoca\PhocaCart\Event\View\Category;

use Joomla\CMS\Event\Result\ResultAware;
use Joomla\CMS\Event\Result\ResultTypeStringAware;
use Joomla\Registry\Registry;
use Phoca\PhocaCart\Event\AbstractEvent;

class ItemAfterAddToCart extends AbstractEvent
{
  use ResultAware, ResultTypeStringAware;

  public function __construct(string $context, object &$item, Registry &$appParams) {
    parent::__construct('pcv', 'onPCVonCategoryItemAfterAddToCart', [
      'context' => $context,
      'item' => &$item,
      'appParams' => &$appParams,
    ]);
  }
}
