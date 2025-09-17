<?php

namespace Projects\WellmedLite\Facades;

class WellmedLite extends \Illuminate\Support\Facades\Facade
{
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor()
  {
    return \Projects\WellmedLite\Contracts\WellmedLite::class;
  }
}
