<?php


namespace Mu\Intervals;


use Mu\Notes\Note;

class IntervalFactory
{
    public function createInterval(float $interval, Note $root = null)
    {
        return new Interval($interval, $root);
    }
}
