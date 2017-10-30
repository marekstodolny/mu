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

    public function resolve(string $name)
    {
        foreach ($this->namings as $naming) {
            if (($semitone = $this->findNote($name, $naming)) !== null) {
                return new Note($name, $semitone);
            }
        }

        return null;
    }

    private function findNote(string $name, Naming $naming)
    {
        $noteSemitone = null;

        foreach ($naming->getNotes() as $semitone => $names) {
            if (is_array($names)
                && ($names[0] === $name
                || $names[1] === $name)) {
                $noteSemitone = $semitone;
                break;
            }

            if ($names === $name) {
                $noteSemitone = $semitone;
                break;
            }
        }

        return $noteSemitone;
    }
}
