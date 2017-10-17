<?php


namespace Mu\Scales;

use Mu\Collections\NoteCollection;
use Mu\Modes\AbstractMode;
use Mu\Notes\Note;

class Scale
{
    /** @var Note */
    private $root;

    /** @var AbstractMode */
    private $mode;

    /** @var NoteCollection */
    private $notes;

    public function __construct(
        Note $root,
        AbstractMode $mode,
        NoteCollection $notes
    )
    {
        $this->root = $root;
        $this->mode = $mode;
        $this->notes = $notes;
    }

    public function getName(): string
    {
        return $this->root->getName() . ' ' . $this->mode->getName();
    }

    /**
     * @return NoteCollection
     */
    public function getNotes(): NoteCollection
    {
        return $this->notes;
    }
}
