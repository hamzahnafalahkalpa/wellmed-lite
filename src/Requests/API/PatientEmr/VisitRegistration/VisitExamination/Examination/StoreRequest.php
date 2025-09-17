<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\VisitRegistration\VisitExamination\Examination;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\Examination\Environment;

class StoreRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
