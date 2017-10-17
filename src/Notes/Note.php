<?php


namespace Mu\Notes;


class Note
{
    /** @var string */
    private $name;

    /** @var int|null */
    private $baseSemitone;

    /** @var int|null */
    private $octave;

    public function __construct(string $name, int $baseSemitone, int $octave = null)
    {
        $this->name = $name;
        $this->octave = $octave;
        $this->baseSemitone = $baseSemitone;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getOctave()
    {
        return $this->octave;
    }

    public function getFullName(): string
    {
        return $this->name . $this->octave;
    }

    /**
     * @return int|null
     */
    public function getBaseSemitone()
    {
        return $this->baseSemitone;
    }
}
