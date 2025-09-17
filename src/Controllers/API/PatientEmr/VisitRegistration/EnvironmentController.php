<?php

namespace Projects\WellmedLite\Controllers\API\PatientEmr\VisitRegistration;

use Projects\WellmedLite\Controllers\API\PatientEmr\EnvironmentController as EnvEnvironmentController;

class EnvironmentController extends EnvEnvironmentController{
    protected function getVisitRegistrationPaginate(?callable $callback = null){        
        $this->commonRequest();
        return $this->__visit_registration_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->where(function($query){
                $query->whereNull('referral_id')
                    ->orWhere(function($query){
                        $query->whereNotNull('referral_id')
                              ->where('props->prop_referral->status','<>','CREATED');
                    });
            })->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->viewVisitRegistrationPaginate();
    }

    protected function showVisitRegistration(?callable $callback = null){        
        $this->commonRequest();
        return $this->__visit_registration_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->showVisitRegistration();
    }

    protected function deleteVisitRegistration(?callable $callback = null){        
        $this->commonRequest();
        return $this->__visit_registration_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->deleteVisitRegistration();
    }

    protected function storeVisitRegistration(?callable $callback = null){
        $this->commonRequest();
        return $this->__visit_registration_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->storeVisitRegistration();
    }
}
