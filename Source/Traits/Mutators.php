<?php
namespace Epoch\Source\Traits;

use Epoch\Source\Epoch;

trait Mutators
{
  public function copy()
  {
    $copy = new Epoch();
    $copy->setDateTime($this->getDateTime());
    return $copy;
  }

  public function addSecond()
  {
    return $this->addSeconds(1);
  }

  public function addSeconds($count = 1)
  {
    $this->dateTime->add('P' . $count . 'S');
    return $this;
  }

  public function addDay()
  {
    return $this->addDays(1);
  }

  public function addDays($count = 1)
  {
    if (!is_a($this->dateTime, 'DateTime')) return null;
    $this->dateTime->add(new \DateInterval('P' . $count . 'D'));
    return $this;
  }

  public function addMonth()
  {
    return $this->addMonths(1);
  }

  public function addMonths($count = 1)
  {
    $currentDate = (int) $this->dateTime->format('d');
    $this->add('P' . $count . 'M');
    $newCurrentDate = (int) $this->dateTime->format('d');
    $diff = $currentDate - $newCurrentDate;
    if ($diff > 0) {
      $this->add('P' . abs($diff) . 'D');
    } else if ($diff < 0) {
      $this->sub('P' . abs($diff) . 'D');
    }
    return $this;
  }

  public function addYear()
  {
    return $this->addYears();
  }

  public function addYears($count = 1)
  {
    return $this->add('P' . $count . 'Y');
  }

  public function addDecade()
  {
    return $this->addDecades();
  }

  public function addDecades($count = 1)
  {
    return $this->addYears(($count * 10));
  }

  public function addCentury()
  {
    return $this->addCenturies();
  }

  public function addCenturies($count = 1)
  {
    return $this->addYears(($count * 100));
  }

  public function addMillenium()
  {
    return $this->addMillennia();
  }

  public function addMillennia($count = 1)
  {
    return $this->addYears(($count * 1000));
  }

  public function subDay()
  {
    return $this->subDays();
  }

  public function subDays($count = 1)
  {
    return $this->sub('P' . $count . 'D');
  }

  public function subMonth()
  {
    return $this->subMonths();
  }

  public function subMonths($count = 1)
  {
    return $this->sub('P' . $count . 'M');
  }

  public function subYear()
  {
    return $this->subYears();
  }

  public function subYears($count = 1)
  {
    return $this->sub('P' . $count . 'Y');
  }

  public function subDecade()
  {
    return $this->subDecades();
  }

  public function subDecades($count = 1)
  {
    return $this->subYears(($count * 10));
  }

  public function subCentury()
  {
    return $this->subCenturies();
  }

  public function subCenturies($count = 1)
  {
    return $this->subYears(($count * 100));
  }

  public function subMillennium()
  {
    return $this->subMillennia();
  }

  public function subMillennia($count = 1)
  {
    return $this->subYears(($count * 1000));
  }

  public function add($format)
  {
    if (!$this->validDate()) return null;
    $this->dateTime->add(new \DateInterval($format));
    return $this;
  }

  public function sub($format)
  {
    if (!$this->validDate()) return null;
    $this->dateTime->sub(new \DateInterval($format));
    return $this;
  }

}