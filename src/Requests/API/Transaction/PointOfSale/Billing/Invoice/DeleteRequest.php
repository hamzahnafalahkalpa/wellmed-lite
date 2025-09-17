<?php

namespace Projects\WellmedLite\Requests\API\Transaction\PointOfSale\Billing\Invoice;

use Projects\WellmedLite\Requests\API\Transaction\Invoice\Environment;

class DeleteRequest extends Environment
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [];
  }
}