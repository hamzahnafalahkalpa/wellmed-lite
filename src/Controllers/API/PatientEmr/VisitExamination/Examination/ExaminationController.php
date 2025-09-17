<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\VisitExamination\Examination;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\Examination\{
    StoreRequest
};
use Projects\WellmedLite\Controllers\API\PatientEmr\VisitExamination\Examination\EnvironmentController;

class ExaminationController extends EnvironmentController
{
    public function store(StoreRequest $request){
        return $this->storeExamination();
    }
}
