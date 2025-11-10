<?php

namespace Projects\WellmedLite\Models\ModulePatient\EMR;

use Hanafalah\ModulePatient\Models\EMR\VisitRegistration as EMRVisitRegistration;

class VisitRegistration extends EMRVisitRegistration
{
    public function encounterSatuSehat(){return $this->morphOneModel('EncounterSatuSehat','reference');}
}
