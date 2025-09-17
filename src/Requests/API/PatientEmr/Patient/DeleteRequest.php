<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient;

class DeleteRequest extends PatientEnvironment
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