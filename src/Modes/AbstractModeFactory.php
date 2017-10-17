<?php


namespace Mu\Modes;


use Mu\Collections\IntervalCollection;
use Mu\Intervals\IntervalFactory;
use Mu\Notes\Note;

abstract class AbstractModeFactory
{
    /**
     * @var float[]
     */
    protected $intervals;

    /**
     * @var IntervalFactory
     */
    protected $intervalFactory;

    /**
     * @var Note
     */
    protected $root;

    public function __construct(IntervalFactory $intervalFactory, Note $root = null)
    {
        $this->intervalFactory = $intervalFactory;
        $this->root = $root;
    }

    abstract public function create(): AbstractMode;

    protected function prepareIntervalCollection()
    {
        $intervalList = [];

        foreach ($this->intervals as $interval) {
            $intervalList[] = $this->intervalFactory->createInterval($interval, $this->root);
        }

        return new IntervalCollection($intervalList);
    }
}
