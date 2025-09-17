<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient\EMR;

use Illuminate\Validation\Rule;
use Projects\WellmedLite\Requests\API\PatientEmr\Patient\EMR\PatientEnvironment;

class ViewRequest extends PatientEnvironment
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
