<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\Patient;

use Projects\WellmedLite\Requests\API\PatientEmr\Patient\{
    ShowRequest, ViewRequest, DeleteRequest, StoreRequest
};

class PatientController extends EnvironmentController{

    public function index(ViewRequest $request){
        $this->recombineRequest();
        return $this->__schema->viewPatientPaginate();
    }

    public function store(StoreRequest $request){
        $possibleTypes = ['people'];

        $reference = null;
        $referenceType = null;

        foreach ($possibleTypes as $type) {
            if (request()->filled($type)) {
                $reference = request()->input($type);
                $referenceType = $type;
                break;
            }
        }

        $data = array_fill_keys($possibleTypes, null);
        $data['reference'] = $reference;
        $data['reference_type'] = $referenceType;
        request()->merge($data);
        return $this->__schema->storePatient();
    }

    public function show(ShowRequest $request){
        return $this->__schema->showPatient();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deletePatient();
    }
}
