<?php


namespace Mu\Scales;


use Mu\Collections\NoteCollection;
use Mu\Config;
use Mu\Notes\Note;
use Mu\Modes\AbstractMode as Mode;

class ScaleFactory
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function create(Note $root, Mode $mode): Scale
    {
        return new Scale($root, $mode, $this->prepareNotes($root, $mode));
    }
    
    public function prepareNotes(Note $root, Mode $mode): NoteCollection
    {
        $rootBaseSemitone = $root->getBaseSemitone();
        $modeIntervals = $mode->getIntervals();

        $notes = [];

        foreach ($modeIntervals as $interval) {
            $semitonesFromRoot = $rootBaseSemitone + $interval->getSemitones();
            $baseSemitone = $semitonesFromRoot % 12;

            $notes[] = new Note($this->config->getNotes()[$baseSemitone], $baseSemitone);
        }

        return new NoteCollection($notes);
    }
}
