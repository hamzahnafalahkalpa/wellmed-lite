<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Referral;

class ViewRequest extends EnvironmentRequest
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
