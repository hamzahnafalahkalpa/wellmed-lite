<?php

namespace Projects\WellmedLite\Controllers\API\SatuSehat;

use Hanafalah\SatuSehat\Contracts\Schemas\OAuth2;
use Projects\WellmedLite\Controllers\API\ApiController;

class EnvironmentController extends ApiController{
    public function __construct(
        public OAuth2 $__oauth
    ){
        parent::__construct();
    }
}