<?php

namespace Projects\WellmedLite\Controllers\API\Setting;

use Hanafalah\ModulePatient\Enums\PatientType\Flag;
use Hanafalah\ModulePatient\Contracts\Schemas\PatientTypeService;
use Projects\WellmedLite\Controllers\API\ApiController;
use Projects\WellmedLite\Requests\API\Setting\PatientTypeService\{
    ViewRequest, StoreRequest, DeleteRequest
};

class PatientTypeServiceController extends ApiController{
    public function __construct(
        protected PatientTypeService $__schema
    ){
        request()->merge(['flag' => Flag::SERVICE->value]);
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__schema->viewPatientTypeServiceList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storePatientTypeService();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deletePatientTypeService();
    }
}