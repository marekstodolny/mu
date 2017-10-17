<?php


namespace Mu\Modes;


use Mu\Collections\IntervalCollection;

abstract class AbstractMode
{
    /** @var string */
    private $name;

    /** @var IntervalCollection */
    private $intervals;

    final public function __construct(string $name, IntervalCollection $intervals)
    {
        $this->name = $name;
        $this->intervals = $intervals;
    }

    final public function getIntervals(): IntervalCollection
    {
        return $this->intervals;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
