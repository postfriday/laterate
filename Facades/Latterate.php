<?php namespace Postfriday\Latterate\Facades;

use Illuminate\Support\Facades\Facade;

class Latterate extends Facade
{
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor()
  {
    return "Latterate";
  }
}
