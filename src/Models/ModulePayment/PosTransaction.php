<?php

namespace Projects\WellmedLite\Models\ModulePayment;

use Hanafalah\ModulePayment\Models\Transaction\PosTransaction as TransactionPosTransaction;
use Projects\WellmedLite\Transformers\PosTransaction\{ViewPosTransaction, ShowPosTransaction};

class PosTransaction extends TransactionPosTransaction{

    public function showUsingRelation(): array{
        return $this->mergeArray(parent::showUsingRelation(),[
            'consument.reference.reference'
        ]);
    }

    public function getViewResource(){return ViewPosTransaction::class;}
    public function getShowResource(){return ShowPosTransaction::class;}
}
