<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitRegistration;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitRegistration\EnvironmentRequest;

class ShowRequest extends EnvironmentRequest
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
