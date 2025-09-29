<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\Patient;

use Hanafalah\ModulePatient\Contracts\Schemas\Patient;
use Projects\WellmedLite\Controllers\API\ApiController as ApiBaseController;

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected Patient $__schema,
    ){
        parent::__construct();
        $this->userAttempt();
    }

    protected function recombineRequest(){
        if (isset(request()->search_value)){
            $this->__schema->setParamLogic('or');
            request()->merge([
                'search_name'           => request()->search_value,
                'search_dob'            => request()->search_value,
                'search_nik'            => request()->search_value,
                'search_crew_id'        => request()->search_value,
                'search_medical_record' => request()->search_value,
                'search_value' => null
            ]);
        }
    }
}
