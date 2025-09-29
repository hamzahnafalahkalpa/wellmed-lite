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
        if (isset($reference)) $data['reference'] = $reference;
        $data['reference_type'] = $referenceType;
        if (isset(request()->visit_examination)){
            $visit_examination = request()->visit_examination;
            $patient_type_service_id = $visit_examination['patient_type_service_id'] ?? $this->PatientTypeServiceModel()->where('label','UMUM')->firstOrFail()->getKey();
            $medic_service_id        = $visit_examination['medic_service_id'] ?? $this->MedicServiceModel()->where('label','UMUM')->firstOrFail()->getKey();

            $visit_patient = [
                'id' => null,
                "patient_type_service_id" => $patient_type_service_id,
                'visit_registration' => [
                    'id' => null,
                    "practitioner_evaluation" => [ //nullable, FOR HEAD DOCTOR
                        "practitioner_type" => "Employee", //nullable, default from config
                        "practitioner_id"=> $this->global_employee->getKey(), //GET FROM AUTOLIST - EMPLOYEE LIST (DOCTOR)
                        "as_pic"=> true //nullable, default false, in:true/false
                    ],
                    "medic_service_id"  => $medic_service_id,
                    'visit_examination' => $visit_examination
                ]
            ];
            request()->merge([
                'visit_examination' => null,
                'visit_patient' => $visit_patient
            ]);
        }

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
