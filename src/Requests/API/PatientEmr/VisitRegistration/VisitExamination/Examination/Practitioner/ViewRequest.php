<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\VisitRegistration\VisitExamination\Examination\Practitioner;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\Examination\Practitioner\Environment;

class ViewRequest extends Environment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    return [];
  }
}