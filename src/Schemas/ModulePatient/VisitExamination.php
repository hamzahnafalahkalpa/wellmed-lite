<?php

namespace Projects\WellmedLite\Schemas\ModulePatient;

use Hanafalah\ModulePatient\Contracts\Data\VisitExaminationData;
use Hanafalah\ModulePatient\Schemas\VisitExamination as SchemasVisitExamination;
use Illuminate\Database\Eloquent\Model;
use Projects\WellmedLite\Contracts\Schemas\ModulePatient\VisitExamination as ModulePatientVisitExamination;

class VisitExamination extends SchemasVisitExamination implements ModulePatientVisitExamination
{
    public function prepareVisitExaminationSignOff(VisitExaminationData $visit_examination_dto): Model{
        $visit_examination = parent::prepareVisitExaminationSignOff($visit_examination_dto);

        $visit_registration_model = $visit_examination_dto->visit_registration_model ?? $this->VisitRegistrationModel()->findOrFail($visit_examination->visit_registration_id); 
        $visit_examination_dto->visit_registration_model ??= $visit_registration_model;

        $medic_service_model = $visit_registration_model->medicService;
        $parent = $medic_service_model->parent;
        if (
            in_array($medic_service_model->label,['MCU','RADIOLOGI','UGD']) ||
            (isset($parent) && in_array($parent->label,['LABORATORIUM','RAWAT JALAN']))
        ){
            $this->prepareEncounterBundling($visit_examination_dto);
        }

        return $visit_examination;
    }

    protected function prepareEncounterBundling(VisitExaminationData $visit_examination_dto): array{
        $visit_examination = $visit_examination_dto->visit_examination_model;
        $visit_patient = $visit_examination_dto->visit_patient_model ?? $this->VisitPatientModel()->findOrFail($visit_examination->visit_patient_id);
        $form_summaries = $visit_examination->form_summaries;
        $form_keys = array_column($form_summaries,'morph');
        $visit_examination_observation_satu_sehat_log = $visit_examination->observationSatuSehat;

        $participants = $visit_examination->practitionerEvaluations;
        $satu_sehat_participants = [];
        foreach ($participants as $participant) {
            $practitioner = $participant->practitioner;
            if (isset($practitioner->prop_card_identity['ihs_number'])) {
                $satu_sehat_participants[] = $practitioner->prop_card_identity['ihs_number'];
            }
        }

        $form_payload = array_merge($visit_examination_observation_satu_sehat_log?->payload ?? [
            "encounter_code"     => null,
            "encounter_display"  => "Pemeriksaan Pasien ".$visit_patient->prop_patient['name'] ?? null,
            "status"             => "final",
            "patient_code"       => "P20395442372",
            "organization_code"  => config('satu-sehat.organization_id'),
            "practitioner_codes" => $satu_sehat_participants ?? [],
            "issued_at"          => $visit_examination->sign_off_at,
            "category"           => [
                "vital_signs" => [
                    "heart_rate" => null,
                    "oxygen_saturation" => null,
                    "respiratory_rate" => null,
                    "body_temperature" => null,
                    "body_height" => null,
                    "body_weight" => null,
                    "body_mass_index" => null,
                    "systolic_blood_pressure" => null,
                    "diastolic_blood_pressure" => null
                ]
            ]
        ]);
        //KHUSUS KEBUTUHAN WELLMED
        $observation_category = &$form_payload['category']['vital_signs'];
        
        $visit_examination->load(['assessment' => function($query){
            $query->where('morph','VitalSign');
        }]);

        if (isset($visit_examination->assessment)){
            $vital_sign = $visit_examination->assessment->props['exam'];
            $observation_category = array_merge($observation_category, [
                "heart_rate" => $vital_sign['heart_rate'] ?? null,
                "oxygen_saturation" => $vital_sign['oxygen_saturation'] ?? null,
                "respiratory_rate" => $vital_sign['respiratory_rate'] ?? null,
                "body_temperature" => $vital_sign['temperature'] ?? null,
                "systolic_blood_pressure" => $vital_sign['systolic'] ?? null,
                "diastolic_blood_pressure" => $vital_sign['diastolic'] ?? null,
                "body_height" => null,
                "body_weight" => null,
                "body_mass_index" => null
            ]);
        }
        try {
            $encounter_satu_sehat = $this->schemaContract('encounter_satu_sehat')->useAccessToSatuSehat()
                ->prepareStoreEncounterSatuSehat(
                $this->requestDTO(
                    config('app.contracts.EncounterSatuSehatData'),[
                        'model' => $visit_examination,
                        'form'  => $form_payload
                    ]
                )
            );
        } catch (\Throwable $th) {
        }
        return $encounter_bundling;
    }
}