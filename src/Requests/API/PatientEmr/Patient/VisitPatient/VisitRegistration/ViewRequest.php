<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitPatient\EnvironmentRequest;

class ViewRequest extends EnvironmentRequest
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