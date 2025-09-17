<?php

namespace Projects\WellmedLite\Controllers\API\Navigation\Notification;

use Hanafalah\ModuleEmployee\Contracts\Schemas\Employee;
use Projects\WellmedLite\Controllers\API\ApiController;
use Projects\WellmedLite\Requests\API\Navigation\Profile\ShowRequest;

class NotificationController extends ApiController{
    public function __construct(
        protected Employee $__employee_schema    
    ){}


    public function show(ShowRequest $request){
        return $this->__employee_schema->showProfile();
    }
}