<?php

namespace AfyScrapper\Exceptions;

use Exception;

class InternalServerErrorException extends Exception
{
    protected $message = 'Internal Server Error';
    protected $code = 500;
}
