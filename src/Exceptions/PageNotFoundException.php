<?php

namespace AfyScrapper\Exceptions;

use Exception;

class PageNotFoundException extends Exception
{
    protected $message = 'Page Not Found';
    protected $code = 404;
}
