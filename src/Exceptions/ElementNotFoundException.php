<?php

namespace AfyScrapper\Exceptions;

use Exception;

class ElementNotFoundException extends Exception
{
    protected $message = 'Element {element} not found';
    protected $code = 404;

    public function __construct(private readonly string $element)
    {
        $this->message = str_replace('{element}', $this->element, $this->message);
        parent::__construct($this->message, $this->code);
    }
}
