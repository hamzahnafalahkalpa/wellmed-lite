<?php

namespace Projects\WellmedLite\Requests\API\Transaction\PointOfSale;

use Projects\WellmedLite\Requests\API\Transaction\Environment;

class StoreRequest extends Environment
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
