<?php

namespace Architekt;

use Exception;

class NotNumericException extends Exception
{
    public function __construct()
    {
        parent::__construct("The element is not a number");
    }
}