<?php

namespace Projects\WellmedLite\Models\ModuleTransaction;

use Hanafalah\ModuleTransaction\Models\Transaction\Transaction as TransactionTransaction;

class Transaction extends TransactionTransaction
{
    public function paymentSummary(){return $this->hasOneModel('PaymentSummary');}
}
