<?php


namespace Mu;


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
            $config = new Config();
        }

        $this->tuning = $tuning;
        $this->config = $config;
    }

    public function buildScale(): ScaleBuilder
    {
        return new ScaleBuilder($this->config);
    }
}
