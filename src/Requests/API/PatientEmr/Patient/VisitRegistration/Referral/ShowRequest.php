<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitRegistration\Referral;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitRegistration\Referral\EnvironmentRequest;

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
