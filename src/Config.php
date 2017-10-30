<?php


namespace Mu;


use Mu\Naming\Naming;

class Config
{
    /** @var Naming */
    private $defaultNaming;

    /** @var Naming[] */
    private $namings;

    public function __construct(Naming $naming, array $namings = [])
    {
        $this->defaultNaming = $naming;

        array_unshift($namings, $naming);
        $this->namings = $namings;
    }

    /**
     * @return Naming
     */
    public function getDefaultNaming(): Naming
    {
        return $this->defaultNaming;
    }

    /**
     * @return Naming[]
     */
    public function getNamings(): array
    {
        return $this->namings;
    }
}
