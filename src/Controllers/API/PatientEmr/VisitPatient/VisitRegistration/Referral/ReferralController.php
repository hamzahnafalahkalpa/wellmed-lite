<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\VisitPatient\VisitRegistration\Referral;

use Projects\WellmedLite\Controllers\API\PatientEmr\VisitRegistration\Referral\EnvironmentController;
use Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitRegistration\Referral\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ReferralController extends EnvironmentController
{ 
    public function index(ViewRequest $request){
        return $this->getReferralPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showReferral();
    }

    public function store(StoreRequest $request){
        return $this->storeReferral();
    }

    public function delete(DeleteRequest $request){
        return $this->deleteReferral();
    }
}