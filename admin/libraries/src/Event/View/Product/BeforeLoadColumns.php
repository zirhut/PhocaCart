<?php
namespace Phoca\PhocaCart\Event\View\Product;

use Phoca\PhocaCart\Event\AbstractEvent;

class BeforeLoadColumns extends AbstractEvent
{
  public function __construct(string $context, array &$options, array $data = []) {
    parent::__construct('pcv', 'onPCVonProductBeforeLoadColumns', [
      'context' => $context,
      'options' => &$options,
      'data' => &$data,
    ]);
  }
}
