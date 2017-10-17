<?php


namespace Mu\Exceptions;


use Exception;

class NoteNotFoundException extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct("Could not find the `$name` note");
    }
}
