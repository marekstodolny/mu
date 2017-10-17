<?php


namespace Mu;


class Config
{
    /**
     * Array containing note names starting from C
     * Every note has a key equal to amount of semitones from base C.
     *
     * This only supports 12-note system.
     *
     * @var array
     */
    private $notes = [
        'C',
        'C#',
        'D',
        'D#',
        'E',
        'F',
        'F#',
        'G',
        'G#',
        'A',
        'A#',
        'B'
    ];

    /**
     * @return array
     */
    public function getNotes(): array
    {
        return $this->notes;
    }
}
