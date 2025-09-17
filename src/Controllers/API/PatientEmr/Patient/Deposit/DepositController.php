<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\Patient\Deposit;

use Projects\WellmedLite\Controllers\API\Transaction\Deposit\EnvironmentController;
use Projects\WellmedLite\Requests\API\PatientEmr\Patient\Deposit\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class DepositController extends EnvironmentController{
    protected function commonConditional($query){
    }

    public function index(ViewRequest $request){
        return $this->getDepositPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showDeposit();
    }

    public function store(StoreRequest $request){
        return $this->storeDeposit();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteDeposit();
    }
}