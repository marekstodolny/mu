<?php


namespace Mu\Modes\Diatonic\Aeolian;


use Mu\Modes\AbstractMode;
use Mu\Modes\AbstractModeFactory;

class AeolianModeFactory extends AbstractModeFactory
{
    protected $intervals = [0, 2, 3, 5, 7, 8, 10, 12];

    public function create(): AbstractMode
    {
        return new AeolianMode('Aeolian', $this->prepareIntervalCollection());
    }
}
