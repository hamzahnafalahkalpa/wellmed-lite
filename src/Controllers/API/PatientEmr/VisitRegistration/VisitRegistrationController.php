<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\VisitRegistration;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitRegistration\{
    ViewRequest, StoreRequest, ShowRequest, DeleteRequest
};
use Illuminate\Support\Str;

class VisitRegistrationController extends EnvironmentController
{
    protected function commonRequest(){
        $medic_service_label = request()->search_medic_service_label ?? request()->flag ?? null;
        if (isset($medic_service_label)) $medic_service_label = Str::upper(Str::snake($medic_service_label));
        request()->merge([
            // 'search_medic_service_label' => $medic_service_label,
        ]);
    }

    public function index(ViewRequest $request){
        return $this->getVisitRegistrationPaginate(function($query){
            // $query->when($this->isDoctor(),function($query){
            //     $query->whereHas('practitionerEvaluation',function($query){
            //         $query->where('practitioner_type','Employee')
            //             ->where('practitioner_id',$this->global_employee->getKey());
            //     });
            // });
        });
    }

    public function show(ShowRequest $request){
        return $this->showVisitRegistration();
    }

    public function store(StoreRequest $request){
        return $this->storeVisitRegistration();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteVisitRegistration();
    }
}
