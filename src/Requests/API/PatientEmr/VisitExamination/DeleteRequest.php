<?php

namespace Projects\WellmedLite\Requests\API\PatientEmr\VisitExamination;

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
