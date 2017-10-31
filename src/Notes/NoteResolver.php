<?php


namespace Mu\Notes;


use Mu\Naming\Naming;

class NoteResolver
{
    /**
     * @var Naming[]
     */
    private $namings;

    public function __construct(array $namings = [])
    {
        $this->namings = $namings;
    }

    public function resolveNote(string $name)
    {
        [$noteName, $octave] = $this->parseName($name);

        foreach ($this->namings as $naming) {
            $results = $this->find($noteName, $naming);

            if ($results) {
                [$naming, $foundName, $semitone, $value] = $results[0];
                return new Note($foundName, $semitone, (int) $octave);
            }
        }

        return null;
    }

    private function find(string $name, Naming $naming, $findFirst = true)
    {
        $results = [];

        foreach ($naming->getNotes() as $semitone => $value) {
            if ($this->compareNamingToName($value, $name)) {
                $results[] = [$naming, $name, $semitone, $value];

                if ($findFirst) {
                    break;
                }
            }
        }

        return $results;
    }

    private function compareNamingToName($namingValue, $name)
    {
        if (is_array($namingValue)
            && ($namingValue[0] === $name
                || $namingValue[1] === $name)) {
            return true;
        }

        if ($namingValue === $name) {
            return true;
        }

        return false;
    }

    private function parseName(string $name)
    {
        $matches = [];
        preg_match('/([^\d\s]+)(\d?)/', $name, $matches);
        array_shift($matches);

        return $matches;
    }
}
