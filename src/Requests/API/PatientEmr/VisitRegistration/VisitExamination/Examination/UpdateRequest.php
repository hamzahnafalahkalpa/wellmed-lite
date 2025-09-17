<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\VisitRegistration\VisitExamination\Examination;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\Examination\Environment;

class UpdateRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return $this->setRules([
        'visit_examination_id' => ['required'],
        'type'                 => ['required','in:commit, closed-emr-session'],
    ]);
  }
}