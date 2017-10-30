<?php


namespace Mu\Naming;


class Naming
{
    protected static $notes = [
        0 => 'C',
        1 => ['C#', 'Db'],
        2 => ['D'],
        3 => ['D#', 'Eb'],
        4 => 'E',
        5 => 'F',
        6 => ['F#', 'Gb'],
        7 => 'G',
        8 => ['G#', 'Ab'],
        9 => 'A',
        10 => ['A#', 'Bb'],
        11 => 'B'
    ];

    protected $sharpChar = "\u{266F}";
    protected $flatChar = "\u{266D}";

    protected $useFlats = false;
    protected $useChars = false;

    /**
     * @return array
     */
    public function getNotesArray(): array
    {
        return static::$notes;
    }

    /**
     * @param bool $char Use special char for sharps/flats
     * @return array
     */
    public function getNotes($char = null): array
    {
        $char = $char ?: $this->useChars;
        $notes = $char ? $this->getNotesWithChar() : $this->getNotesArray();
        foreach ($notes as $key => $value) {
            if (is_array($value)) {
                $notes[$key] = $this->useFlats ? $notes[$key][1] : $notes[$key][0];
            }
        }

        return $notes;
    }

    protected function getNotesWithChar(): array
    {
        $charNotes = static::$notes;
        foreach ($charNotes as $key => $value) {
            if (is_array($value)) {
                $charNotes[$key][0][1] = $this->sharpChar;
                $charNotes[$key][1][1] = $this->flatChar;
            }
        }

        return $charNotes;
    }

    /**
     * @return string
     */
    public function getFlatChar(): string
    {
        return $this->flatChar;
    }

    /**
     * @return string
     */
    public function getSharpChar(): string
    {
        return $this->sharpChar;
    }
}
