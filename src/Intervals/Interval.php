<?php


namespace Mu\Intervals;


use Mu\Notes\Note;

class Interval
{
    /** @var int */
    private $steps = 0;

    /** @var int */
    private $halfsteps = 0;

    /** @var null|Note */
    private $root;

    /** @var float */
    private $interval;

    /** @var float */
    private $fine;

    public function __construct(float $interval, Note $root = null)
    {
        $this->interval = $interval;
        $this->root = $root;

        $this->resolveInterval();
    }

    private function resolveInterval()
    {
        $stepsRemainder = fmod($this->interval, 1);
        $halfstepsRemainder = fmod($stepsRemainder, 0.5);

        $this->steps = $this->interval - $stepsRemainder;
        $this->halfsteps = ($stepsRemainder - $halfstepsRemainder) * 2;
        $this->fine = $halfstepsRemainder;
    }

    public function getSemitones(): int
    {
        return (int) ($this->interval * 2);
    }
}
