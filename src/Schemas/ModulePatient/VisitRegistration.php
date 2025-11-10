<?php

namespace Projects\WellmedLite\Schemas\ModulePatient;

use Hanafalah\ModulePatient\Contracts\Data\VisitRegistrationData;
use Hanafalah\ModulePatient\Schemas\VisitRegistration as SchemasVisitRegistration;
use Hanafalah\SatuSehat\Facades\SatuSehat;
use Illuminate\Database\Eloquent\Model;
use Projects\WellmedLite\Contracts\Schemas\ModulePatient\VisitRegistration as ModulePatientVisitRegistration;

class VisitRegistration extends SchemasVisitRegistration implements ModulePatientVisitRegistration
{
    public function prepareStoreVisitRegistration(VisitRegistrationData $visit_registration_dto): Model{
        $visit_registration = parent::prepareStoreVisitRegistration($visit_registration_dto);
        $visit_registration->load(['encounterSatuSehat','warehouse','practitionerEvaluations.practitioner']);
        $visit_registration_satu_sehat_log = $visit_registration->encounterSatuSehat;
        $visit_registration_dto->status = $visit_registration->status;
        $visit_patient_model = $visit_registration_dto->visit_patient_model;
        
        $participants = $visit_registration->practitionerEvaluations;
        $satu_sehat_participants = [];
        foreach ($participants as $participant) {
            $practitioner = $participant->practitioner;
            $satu_sehat_participants[] = [
                "participant_code" => $practitioner->prop_card_identity['ihs_number'] ?? null,
                "participant_name" => $practitioner->name ?? null
            ];
        }

        $visited = $visit_patient_model->created_at->format('Y-m-d H:i:s');
        $warehouse = $visit_registration->warehouse;
        $form_payload = array_merge($visit_registration_satu_sehat_log?->payload ?? [
            'status' => $this->getStatusEncounter($visit_registration_dto),
            'class_code' => $this->getClassCodeEncounter($visit_registration_dto),
            'visit_code' => $visit_registration->visit_code ?? $visit_registration->getKey(),
            'organization_code' => config('satu-sehat.organization_id'), //will added below
            'patient_code' => $visit_patient_model->patient_id,
            'patient_name' => $visit_patient_model->prop_patient['name'],
            'period' => $visited,
            'participant' => [
                "attenders" => $satu_sehat_participants ?? []
            ],
            'status_history' => [
                'arrived' => $visited,
                'in-progress' => $visit_registration->created_at->format('Y-m-d H:i:s')
            ],
            'location_code' => $warehouse?->prop_card_identity['ihs_number'] ?? null,
            'location_name' => $warehouse?->name ?? null,
        ]);

        try {
            $encounter_satu_sehat = $this->schemaContract('encounter_satu_sehat')->useAccessToSatuSehat()
                ->prepareStoreEncounterSatuSehat(
                $this->requestDTO(
                    config('app.contracts.EncounterSatuSehatData'),[
                        'model' => $visit_registration,
                        'form'  => $form_payload
                    ]
                )
            );
        } catch (\Throwable $th) {
        }
        return $visit_registration;
    }

    protected function getStatusEncounter(VisitRegistrationData $visit_registration_dto){
        switch ($visit_registration_dto->status) {
            case 'PROCESSING': $status = 'in-progress';break;
            case 'DRAFT':
            default:
                $status = 'arrived';
            break;
        }
        return $status;
    }

    protected function getClassCodeEncounter(VisitRegistrationData $visit_registration_dto){
        switch ($visit_registration_dto->medic_service_model->label) {
            case 'VK'         : 
            case 'RAWAT_INAP' : $class_code = 'IMP';break;
            case 'UGD'        : $class_code = 'EMER';break;
            default:
                $class_code = 'AMB';
            break;
        }
        return $class_code;
    }
}
