<?php

namespace Projects\WellmedLite\Schemas\ModulePatient;

use Hanafalah\ModulePatient\Contracts\Data\VisitPatientData;
use Hanafalah\ModulePatient\Schemas\VisitPatient as SchemasVisitPatient;
use Hanafalah\SatuSehat\Facades\SatuSehat;
use Illuminate\Database\Eloquent\Model;
use Projects\WellmedLite\Contracts\Schemas\ModulePatient\VisitPatient as ModulePatientVisitPatient;

class VisitPatient extends SchemasVisitPatient implements ModulePatientVisitPatient
{
    public function prepareStore(VisitPatientData $visit_patient_dto): Model{
        $visit_patient = parent::prepareStore($visit_patient_dto);
        return $visit_patient;
    }
}
