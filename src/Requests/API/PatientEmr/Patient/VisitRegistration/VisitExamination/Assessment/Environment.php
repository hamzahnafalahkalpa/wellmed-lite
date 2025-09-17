<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitRegistration\VisitExamination\Assessment;

use Hanafalah\LaravelSupport\Requests\FormRequest;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

class Environment extends FormRequest
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
