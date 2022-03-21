<?php

namespace Architekt;

use Exception;

class ZeroException extends Exception
{
    public function __construct()
    {
        parent::__construct("Zero element coef a");
    }
}