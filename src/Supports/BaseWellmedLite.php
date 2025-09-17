<?php

namespace Projects\WellmedLite\Supports;

use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Hanafalah\LaravelSupport\Supports\PackageManagement;

class BaseWellmedLite extends PackageManagement implements DataManagement
{
    protected $__config_name = 'wellmed-lite';
    protected $__wellmed_lite = [];

    /**
     * A description of the entire PHP function.
     *
     * @param Container $app The Container instance
     * @throws Exception description of exception
     * @return void
     */
    public function __construct()
    {
        $this->setConfig($this->__config_name, $this->__wellmed_lite);
    }
}
