<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\VisitPatient\VisitRegistration\VisitExamination\Examination;

use Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\Examination\{
    StoreRequest, UpdateRequest
};
use Projects\WellmedLite\Controllers\API\PatientEmr\VisitExamination\Examination\EnvironmentController;

class ExaminationController extends EnvironmentController
{
    public function store(StoreRequest $request){
        return $this->storeExamination();
    }
}
