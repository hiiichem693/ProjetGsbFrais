<?php

namespace App\Exceptions;
use Exception;
use Throwhable;

class MonException extends Exception
{
    protected $message = 'Unknown exception';
    private $string;
    protected $code = 0;
    protected $file;
    protected $line;
    private $trace;

    public function __construct($message, $code = 0, Exception $previous=null)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
    }
    public function __toString()
    {
        return get_class($this) . " '{$this->message}' in {$this->file} ({$this->line}) \n"
            . "{$this->getTraceAsString()}";
    }

}
