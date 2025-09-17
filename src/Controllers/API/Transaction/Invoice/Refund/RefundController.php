<?php

namespace Projects\WellmedLite\Controllers\API\Transaction\Invoice\Refund;

use Projects\WellmedLite\Requests\API\Transaction\Invoice\Refund\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};
use Projects\WellmedLite\Controllers\API\Transaction\Refund\EnvironmentController;


class RefundController extends EnvironmentController{
    public function index(ViewRequest $request){
        return $this->getRefundPaginate();
    }

    public function show(ShowRequest $request){
        return $this->showRefund();
    }

    public function store(StoreRequest $request){
        return $this->storeRefund();
    }

    public function destroy(DeleteRequest $request){
        return $this->deleteRefund();
    }
}