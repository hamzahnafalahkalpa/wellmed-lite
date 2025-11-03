<?php

namespace Projects\WellmedLite\Requests\API\Reporting;

use Hanafalah\LaravelSupport\Requests\FormRequest;

class ViewRequest extends FormRequest
{
    protected $__entity = 'Transaction';
    

    public function authorize()
    {
        return true;    
    }

    public function rules()
    {
        return [];
    }
}