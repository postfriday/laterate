<?php namespace Postfriday\Latterate;

use Illuminate\Support\Facades\Facade;

class LatterateFacade extends Facade
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
