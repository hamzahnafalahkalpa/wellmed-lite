<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\Assessment;

class ViewRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [];
  }
}
