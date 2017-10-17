<?php


namespace Mu\Modes\Diatonic\Aeolian;


use Mu\Modes\AbstractMode;
use Mu\Modes\AbstractModeFactory;

class AeolianModeFactory extends AbstractModeFactory
{
    protected $intervals = [0, 1, 1.5, 2.5, 3.5, 4, 5, 6];

    public function create(): AbstractMode
    {
        return new AeolianMode('Aeolian', $this->prepareIntervalCollection());
    }
}
