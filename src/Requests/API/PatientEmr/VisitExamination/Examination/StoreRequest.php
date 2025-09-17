<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\Examination;

class StoreRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
