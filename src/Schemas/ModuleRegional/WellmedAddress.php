<?php

namespace Projects\WellmedLite\Schemas\ModuleRegional;

use Hanafalah\ModuleRegional\Contracts\Data\AddressData;
use Hanafalah\ModuleRegional\Schemas\Regional\Address;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Projects\WellmedLite\Contracts\Schemas\ModuleRegional\WellmedAddress as ModuleRegionalWellmedAddress;

class WellmedAddress extends Address implements ModuleRegionalWellmedAddress{
    protected string $__entity = 'WellmedAddress';
    public $wellmed_address_model;

    public function prepareStoreWellmedAddress(AddressData $wellmed_address_dto): Model{
        return $this->wellmed_address_model = $this->prepareStoreAddress($wellmed_address_dto);
    }

    public function wellmedAddress(mixed $conditionals = null): Builder{
        return $this->address($conditionals);
    }
}
