<?php
namespace Epoch\Source;
use Epoch\Source\Traits\Accessors;
use Epoch\Source\Traits\Assigners;
use Epoch\Source\Traits\Mutators;

class Epoch
{
  use Accessors, Assigners, Mutators;

  /**
   * @var \DateTime
   */
  protected $dateTime;

  public function __construct()
  {
    $this->assignNow();
  }

  /**
   * @return Epoch
   */
  public static function now()
  {
    return new Epoch();
  }

  /**
   * @return bool
   */
  public function validDate()
  {
    return isset($this->dateTime) && is_a($this->dateTime, 'DateTime');
  }

  /**
   * @param Epoch $epoch
   * @return bool
   */
  public function validEpoch(Epoch $epoch)
  {
    return isset($epoch->dateTime) && is_a($this->dateTime, 'DateTime');
  }

}