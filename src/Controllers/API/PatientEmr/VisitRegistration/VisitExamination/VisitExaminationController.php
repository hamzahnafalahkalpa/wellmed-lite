<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\VisitRegistration\VisitExamination;

use Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitPatient\VisitRegistration\VisitExamination\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};
use Projects\WellmedLite\Controllers\API\PatientEmr\VisitExamination\EnvironmentController;

class VisitExaminationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        return $this->getVisitExaminationPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showVisitExamination();
    }

    public function store(StoreRequest $request){
        return $this->storeVisitExamination();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteVisitExamination();
    }
}
