<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\Examination\Practitioner;

use Projects\WellmedLite\Controllers\API\PatientEmr\VisitExamination\Examination\Practitioner\EnvironmentController;
use Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\Examination\Practitioner\{
    StoreRequest, ShowRequest, ViewRequest, DeleteRequest
};

class PractitionerController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->__practitioner_evaluation_schema->viewPractitionerEvaluationList();
    }


    public function store(StoreRequest $request){
        return $this->__practitioner_evaluation_schema->storePractitionerEvaluation();
    }

public function show(ShowRequest $request){
        return $this->__practitioner_evaluation_schema->showPractitionerEvaluation();
    }

    public function destroy(DeleteRequest $request){
        return $this->__practitioner_evaluation_schema->deletePractitionerEvaluation();
    }
}
