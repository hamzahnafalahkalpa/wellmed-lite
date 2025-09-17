<?php

namespace Projects\WellmedLite\Controllers;

use App\Http\Controllers\Controller as MainController;
use Projects\WellmedLite\Concerns\HasUser;

abstract class Controller extends MainController
{
    use HasUser;
}
