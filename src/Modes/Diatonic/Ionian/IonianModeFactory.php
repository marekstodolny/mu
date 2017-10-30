<?php


namespace Mu\Modes\Diatonic\Ionian;


use Mu\Modes\AbstractMode;
use Mu\Modes\AbstractModeFactory;

class IonianModeFactory extends AbstractModeFactory
{
    protected $intervals = [0, 2, 4, 5, 7, 9, 11, 12];

    public function create(): AbstractMode
    {
        return new IonianMode('Ionian', $this->prepareIntervalCollection());
    }
}
