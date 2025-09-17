<?php

namespace Projects\WellmedLite\Controllers\API\Setting\Examination;

use Hanafalah\ModuleExamination\Contracts\Schemas\GcsStuff;
use Projects\WellmedLite\Controllers\API\ApiController;
use Projects\WellmedLite\Requests\API\Setting\Examination\GcsStuff\{
    ViewRequest, StoreRequest
};

class GcsStuffController extends ApiController{
    public function __construct(
        protected GcsStuff $__schema
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->viewGcsStuffList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeGcsStuff();
    }
}
