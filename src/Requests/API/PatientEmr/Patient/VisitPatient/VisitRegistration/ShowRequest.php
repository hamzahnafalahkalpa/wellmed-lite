<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitPatient\EnvironmentRequest;

class ShowRequest extends EnvironmentRequest
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