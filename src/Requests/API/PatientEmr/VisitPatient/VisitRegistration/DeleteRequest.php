<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\VisitPatient\VisitRegistration;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitRegistration\EnvironmentRequest;

class DeleteRequest extends EnvironmentRequest
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
