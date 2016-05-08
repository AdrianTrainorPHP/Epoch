<?php
namespace Epoch\Source\Traits;

use Epoch\Source\Epoch;

trait Assigners
{
  /**
   * @return Epoch
   */
  public function assignNow()
  {
    $this->dateTime = new \DateTime();
    return $this;
  }

  /**
   * @param $format
   * @param $datetime
   * @return Epoch
   */
  public static function createFromFormat($format, $datetime)
  {
    $epoch = new Epoch();
    $epoch->dateTime = (new \DateTime)->createFromFormat($format, $datetime);
    return $epoch;
  }

  /**
   * @param $datetime
   * @return $this
   */
  public function setDateTime($datetime)
  {
    if (is_object($datetime) && (is_a($datetime, 'Epoch\\Epoch') || is_a($datetime, 'Epoch\\Source\\Epoch'))) {
      $this->dateTime = $datetime->getDateTime();
    } else if (is_a($datetime, 'DateTime')) {
      $this->dateTime = $datetime;
    }
    return $this;
  }
}