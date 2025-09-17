<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\VisitRegistration;

class StoreRequest extends EnvironmentRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
