<?php

namespace Projects\WellmedLite\Models\ModulePatient\Patient;

use Hanafalah\ModulePatient\Models\Patient\Patient as PatientPatient;
use Hanafalah\ModulePayment\Concerns\HasConsument;
use Projects\WellmedLite\Transformers\Patient\{ViewPatient,ShowPatient};

class Patient extends PatientPatient
{
    // use HasConsument;

    // public function viewUsingRelation(): array{
    //     return $this->mergeArray(parent::viewUsingRelation(),['consument' => function($query){
    //         $query->with([
    //             'paymentSummary','userWallet'
    //         ]);
    //     }]);
    // }

    // public function showUsingRelation(): array{
    //     return $this->mergeArray(parent::viewUsingRelation(),parent::showUsingRelation(),['consument' => function($query){
    //         $query->with([
    //             'paymentSummary','userWallet'
    //         ]);
    //     }]);
    // }

    public function getViewResource(){return ViewPatient::class;}
    public function getShowResource(){return ShowPatient::class;}
}
