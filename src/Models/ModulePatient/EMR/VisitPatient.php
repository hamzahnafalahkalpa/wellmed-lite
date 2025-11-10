<?php

namespace Projects\WellmedLite\Models\ModulePatient\EMR;

use Hanafalah\ModulePatient\Models\EMR\VisitPatient as EMRVisitPatient;

class VisitPatient extends EMRVisitPatient
{
    public function encounterSatuSehat(){return $this->morphOneModel('EncounterSatuSehat','reference');}
}
