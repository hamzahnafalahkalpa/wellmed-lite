<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\Patient\VisitRegistration;

use Projects\WellmedLite\Controllers\API\PatientEmr\VisitRegistration\EnvironmentController;
use Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitRegistration\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class VisitRegistrationController extends EnvironmentController
{

    protected function commonConditional($query){
        $query->where('prop_visit_patient.patient_id',request()->patient_id);
    }

    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showVisitRegistration();
    }

    public function store(StoreRequest $request){
        return $this->storeVisitRegistration();
    }

    public function delete(DeleteRequest $request){
        return $this->deleteVisitRegistration();
    }
}
