<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitRegistration\VisitExamination\Examination;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\Examination\Environment;

class ViewRequest extends Environment
{
  public function authorize(){
    return true;
  }
  
  public function rules(){    
    return [
      'visit_examination_id' => ['required',$this->idValidation('VisitExamination')]
    ];
  }
}
