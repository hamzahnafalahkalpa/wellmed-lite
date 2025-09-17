<?php

namespace Projects\WellmedLite\Controllers\API\Setting\Examination;

use Hanafalah\ModuleExamination\Contracts\Schemas\AllergyStuff;
use Projects\WellmedLite\Controllers\API\ApiController;
use Projects\WellmedLite\Requests\API\Setting\Examination\AllergyStuff\{
    ViewRequest, StoreRequest, DeleteRequest
};

class AllergyStuffController extends ApiController{
    public function __construct(
        protected AllergyStuff $__schema
    ){}

    public function index(ViewRequest $request){
        return $this->__schema->viewAllergyStuffList();
    }

    public function store(StoreRequest $request){
        return $this->__schema->storeAllergyStuff();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteAllergyStuff();
    }
}
