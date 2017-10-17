<?php


namespace Mu\Modes\Diatonic\Ionian;


use Mu\Modes\AbstractMode;
use Mu\Modes\AbstractModeFactory;

class IonianModeFactory extends AbstractModeFactory
{
    protected $intervals = [0, 1, 2, 2.5, 3.5, 4.5, 5.5, 6];

    public function create(): AbstractMode
    {
        return new IonianMode('Ionian', $this->prepareIntervalCollection());
    }
}
