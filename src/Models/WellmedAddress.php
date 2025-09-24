<?php

namespace Projects\WellmedLite\Models\Unicode;

use Hanafalah\ModuleRegional\Models\Regional\Address;

class WellmedAddress extends Address{
    public function getForeignKey(){
        return 'address_id';
    }
}
