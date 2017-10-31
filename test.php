<?php

require_once './vendor/autoload.php';

$notes = ['C4', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B'];
$modes = [
    \Mu\Modes\Diatonic\Ionian\IonianMode::class,
    \Mu\Modes\Diatonic\Aeolian\AeolianMode::class
];

$mu = new \Mu\Mu();

$noteResolver = new \Mu\Notes\NoteResolver();


foreach ($modes as $mode) {
    foreach ($notes as $root) {
        $scale = $mu->buildScale()
            ->setRootByName($root)
            ->setMode($mode)
            ->build();

        echo $scale->getName() . ' :';

        foreach ($scale->getNotes() as $note) {
            echo ' ' . $note->getFullName();
        }

        echo '<br>';
    }

    echo '<br>';
}
