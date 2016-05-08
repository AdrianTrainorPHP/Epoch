<?php
namespace Epoch\Source\Traits;

trait Accessors
{

  /**
   * @param string $format
   * @return null
   */
  public function format($format = 'Y-m-d H:i:s')
  {
    if (!$this->validDate()) return null;
    return $this->dateTime->format($format);
  }

  /**
   * @return string|null
   */
  public function unix()
  {
    if (!$this->validDate()) return null;
    return $this->format('U');
  }

  /**
   * @param \Epoch\Source\Epoch $epoch
   * @return \DateInterval|null
   */
  public function diff(\Epoch\Source\Epoch $epoch)
  {
    if (!$this->validDate()) return null;
    if (!$this->validEpoch($epoch)) return null;
    return $this->dateTime->diff($epoch->getDateTime(), true);
  }

  /**
   * @param \Epoch\Source\Epoch $epoch
   * @return int|null
   */
  public function diffInSeconds(\Epoch\Source\Epoch $epoch)
  {
    if (!$diff = $this->diff($epoch)) return null;
    return $diff->s;
  }

  /**
   * @param \Epoch\Source\Epoch $epoch
   * @return int|null
   */
  public function diffInMinutes(\Epoch\Source\Epoch $epoch)
  {
    if (!$diff = $this->diff($epoch)) return null;
    return $diff->m;
  }

  /**
   * @param \Epoch\Source\Epoch $epoch
   * @return int|null
   */
  public function diffInHours(\Epoch\Source\Epoch $epoch)
  {
    if (!$diff = $this->diff($epoch)) return null;
    return $diff->h;
  }

  /**
   * @param \Epoch\Source\Epoch $epoch
   * @return int|null
   */
  public function diffInDays(\Epoch\Source\Epoch $epoch)
  {
    if (!$diff = $this->diff($epoch)) return null;
    return $diff->d;
  }

  /**
   * @param \Epoch\Source\Epoch $epoch
   * @return int|null
   */
  public function diffInYears(\Epoch\Source\Epoch $epoch)
  {
    if (!$diff = $this->diff($epoch)) return null;
    return $diff->y;
  }

  /**
   * @param \Epoch\Source\Epoch $epoch
   * @return int|null
   */
  public function diffInDecades(\Epoch\Source\Epoch $epoch)
  {
    if (!$diff = $this->diff($epoch)) return null;
    return floor($diff->y / 10);
  }

  /**
   * @param \Epoch\Source\Epoch $epoch
   * @return int|null
   */
  public function diffInCenturies(\Epoch\Source\Epoch $epoch)
  {
    if (!$diff = $this->diff($epoch)) return null;
    return floor($diff->y / 100);
  }

  /**
   * @param \Epoch\Source\Epoch $epoch
   * @return int|null
   */
  public function diffInMillennia(\Epoch\Source\Epoch $epoch)
  {
    if (!$diff = $this->diff($epoch)) return null;
    return floor($diff->y / 1000);
  }

  /**
   * @return \DateTime|null
   */
  public function getDateTime()
  {
    if (!$this->validDate()) return null;
    return $this->dateTime;
  }
}