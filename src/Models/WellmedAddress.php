<?php

namespace Projects\WellmedLite\Models;

use Hanafalah\ModuleRegional\Models\Regional\Address;

class WellmedAddress extends Address{
    protected $table = 'addresses';

    public function getForeignKey(){
        return 'address_id';
    }
}
