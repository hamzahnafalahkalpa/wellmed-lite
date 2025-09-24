<?php

namespace Projects\WellmedLite\Models;

use Hanafalah\ModuleEncoding\Models\Encoding\Encoding;

class WellmedEncoding extends Encoding{
    public function getForeignKey(){
        return 'encoding_id';
    }
}
