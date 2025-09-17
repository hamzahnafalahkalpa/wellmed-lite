<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\VisitPatient;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitPatient\{
    ShowRequest, ViewRequest, DeleteRequest, StoreRequest
};

class VisitPatientController extends EnvironmentController{

    public function index(ViewRequest $request){
        return $this->getVisitPatientPaginate();
    }

    public function store(StoreRequest $request){
        return $this->storeVisitPatient();
    }

    public function show(ShowRequest $request){
        return $this->showVisitPatient();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteVisitPatient();
    }
}
