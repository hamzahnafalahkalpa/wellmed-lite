<?php

namespace Projects\WellmedLite\Controllers\API\SatuSehat;

use Illuminate\Http\Request;

class AuthController extends EnvironmentController{
    public function store(Request $request){
        return $this->__oauth->storeOAuth2();
    }
}