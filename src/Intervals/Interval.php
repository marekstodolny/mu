<?php


namespace Mu\Intervals;


use Mu\Notes\Note;

class Interval
{
    /** @var int */
    private $semitones = 0;

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
        $this->fine = fmod($this->interval, 1);
        $this->semitones = $this->interval - $this->fine;
    }

    public function getSemitones(): int
    {
        return $this->semitones;
    }
}
