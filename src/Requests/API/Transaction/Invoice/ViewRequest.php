<?php

namespace Projects\WellmedLite\Requests\API\Transaction\Invoice;

use Projects\WellmedLite\Requests\API\Transaction\Invoice\Environment;

class ViewRequest extends Environment
{

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
    ];
  }
}