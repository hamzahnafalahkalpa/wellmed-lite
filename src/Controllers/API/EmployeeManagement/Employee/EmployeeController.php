<?php

namespace Projects\WellmedLite\Controllers\API\EmployeeManagement\Employee;

use Hanafalah\ModuleEmployee\Contracts\Schemas\Employee;
use Projects\WellmedLite\Controllers\API\ApiController;
use Projects\WellmedLite\Requests\API\EmployeeManagement\Employee\{
    ViewRequest, StoreRequest, ShowRequest,
    DeleteRequest
};

class EmployeeController extends ApiController{
    public function __construct(
        protected Employee $__employee_schema    
    ){}

    public function index(ViewRequest $request){
        return $this->__employee_schema->viewEmployeePaginate();
    }

    public function show(ShowRequest $request){
        return $this->__employee_schema->showEmployee();
    }

    public function store(StoreRequest $request){
        $this->userAttempt();
        if (isset(request()->user_reference)){
            $user_reference = request()->user_reference;
            $tenant = tenancy()->tenant;
            $user_reference['workspace_type'] = $tenant->getMorphClass();
            $user_reference['workspace_id']   = $tenant->getKey();
            $user = $user_reference['user'];
            $user['email_verified_at'] = now();
            request()->merge([
                'user_reference' => $user_reference
            ]);
        }
        return $this->__employee_schema->storeEmployee();
    }

    public function destroy(DeleteRequest $request){
        return $this->__employee_schema->deleteEmployee();
    }
}