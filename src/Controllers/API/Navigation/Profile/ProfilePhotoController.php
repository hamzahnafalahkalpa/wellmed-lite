<?php

namespace Projects\WellmedLite\Controllers\API\Navigation\Profile;

use Hanafalah\ModuleEmployee\Contracts\Schemas\ProfilePhoto;
use Projects\WellmedLite\Controllers\API\ApiController;
use Projects\WellmedLite\Requests\API\Navigation\Profile\{
    ShowRequest, StoreRequest
};

class ProfilePhotoController extends ApiController{
    public function __construct(
        protected ProfilePhoto $__profile_schema    
    ){}

    public function store(StoreRequest $request){
        return $this->__profile_schema->storeProfilePhoto();
    }

    public function show(ShowRequest $request){
        return $this->__profile_schema->showProfilePhoto();
    }
}