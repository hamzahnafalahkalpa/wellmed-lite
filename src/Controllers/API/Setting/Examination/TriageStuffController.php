<?php

namespace Projects\WellmedLite\Controllers\API\Setting\Examination;

use Hanafalah\ModuleExamination\Contracts\Schemas\TriageStuff;
use Projects\WellmedLite\Controllers\API\ApiController;
use Projects\WellmedLite\Requests\API\Setting\Examination\TriageStuff\{
    ViewRequest, StoreRequest
};

class TriageStuffController extends ApiController{
    public function __construct(
        protected TriageStuff $__schema
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->viewTriageStuffList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeTriageStuff();
    }
}
