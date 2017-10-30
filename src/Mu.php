<?php


namespace Mu;


use Mu\Naming\German;
use Mu\Naming\Naming;

class Mu
{
    /**
     * @var Tuning
     */
    private $tuning;

    /**
     * @var Config
     */
    private $config;

    public function __construct(Tuning $tuning = null, Config $config = null)
    {
        if (!$tuning instanceof Tuning) {
            $tuning = new Tuning();
        }

        if (!$config instanceof Config) {
            $naming = new Naming();
            $alternativeNamings = [new German()];
            $config = new Config($naming, $alternativeNamings);
        }

        $this->tuning = $tuning;
        $this->config = $config;
    }

    public function buildScale(): ScaleBuilder
    {
        return new ScaleBuilder($this->config);
    }
}
