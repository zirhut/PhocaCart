<?php
namespace Phoca\PhocaCart\Event\Tax;

use Phoca\PhocaCart\Event\AbstractEvent;

class UserAddressBeforeSaveOrder extends AbstractEvent
{
  public function __construct(string $context, object &$address, array $data) {
    parent::__construct('pct', 'onPCTonUserAddressBeforeSaveOrder', [
      'context' => $context,
      'address' => $address,
      'data' => $data,
    ]);
  }
}
