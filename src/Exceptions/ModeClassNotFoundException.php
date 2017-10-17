<?php


namespace Mu\Exceptions;


use Exception;
use Throwable;

class ModeClassNotFoundException extends Exception
{
    public function __construct(
        string $message = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        $message = "The class `{$message}` for a mode could not be found.";
        parent::__construct($message, $code, $previous);
    }
}
