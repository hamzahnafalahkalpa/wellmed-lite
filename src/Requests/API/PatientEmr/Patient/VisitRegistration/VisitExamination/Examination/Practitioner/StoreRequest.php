<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitRegistration\VisitExamination\Examination\Practitioner;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\Examination\Practitioner\Environment;

class StoreRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [
      'id'                  => ['nullable'],
      'practitioner_id'     => ['required',$this->idValidation(app(config('module-patient.practitioner')))], 
      'as_delegation'       => ['nullable','boolean']
    ];
  }
}