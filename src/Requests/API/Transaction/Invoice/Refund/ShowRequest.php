<?php

namespace Projects\WellmedLite\Requests\API\Transaction\Invoice\Refund;

use Projects\WellmedLite\Requests\API\Transaction\Refund\Environment;

class ShowRequest extends Environment
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
