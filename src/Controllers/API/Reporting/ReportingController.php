<?php

namespace Projects\WellmedLite\Controllers\API\Reporting;

use Hanafalah\LaravelPermission\Contracts\Schemas\Menu;
use Hanafalah\ModulePayment\Contracts\Schemas\PosTransaction;
use Hanafalah\ModuleTransaction\Contracts\Schemas\Transaction;
use Projects\WellmedLite\Controllers\API\ApiController;
use Projects\WellmedLite\Requests\API\Reporting\{
    ViewRequest
};

class ReportingController extends ApiController{
    public function __construct(
        protected Transaction $__transaction,
        protected PosTransaction $__pos_transaction
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        $this->userAttempt();
        return [];
    }
}