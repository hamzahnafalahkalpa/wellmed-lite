<?php

namespace Projects\WellmedLite\Controllers\API\Transaction\Invoice;

use Projects\WellmedLite\Requests\API\Transaction\Invoice\{
    ViewRequest, ShowRequest
};

class InvoiceController extends EnvironmentController{
    protected function commonConditional($query){
        $query->whereNotNull('reported_at')->where('props->is_deferred',false);
    }

    public function index(ViewRequest $request){
        return $this->getInvoicePaginate();
    }

    public function show(ShowRequest $request){
        return $this->showInvoice();
    }
}