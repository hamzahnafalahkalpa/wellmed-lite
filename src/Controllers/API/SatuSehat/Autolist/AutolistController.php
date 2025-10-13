<?php

namespace Projects\WellmedLite\Controllers\API\SatuSehat\Autolist;

use Hanafalah\LaravelHasProps\Models\Scopes\HasCurrentScope;
use Hanafalah\LaravelSupport\Concerns\Support\HasCache;
use Illuminate\Http\Request;
use Projects\WellmedLite\Controllers\API\ApiController;
use Illuminate\Support\Str;
use Hanafalah\ModuleMedicService\Enums\Label as MedicServiceLabel;

class AutolistController extends ApiController{
    use HasCache;

    protected $__onlies = [
    ];

    public function index(Request $request){
        $morph = Str::studly(request()->morph);
        switch ($morph) {
            default:
                return $this->callAutolist($morph);
            break;
        }
    }

    private function callAutolist(string $morph,?callable $callback = null){
        return app(config('app.contracts.'.$morph))->autolist(request()->type,$callback);
    }
}