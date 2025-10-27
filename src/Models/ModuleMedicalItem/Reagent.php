<?php

namespace Projects\WellmedLite\Models\ModuleMedicalItem;

use Hanafalah\ModuleMedicalItem\Models\Reagent as ModelsReagent;

class Reagent extends ModelsReagent
{
    protected function isUsingMedicalItem(): bool{
        return false;
    }
}
