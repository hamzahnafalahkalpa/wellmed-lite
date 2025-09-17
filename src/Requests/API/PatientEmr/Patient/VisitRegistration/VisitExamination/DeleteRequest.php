<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\Patient\VisitRegistration\VisitExamination;

use Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination\EnvironmentRequest;

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
