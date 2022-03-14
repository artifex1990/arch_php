<?php

use PHPUnit\Framework\TestCase;
use Architekt\Quadratic;

class TestQuadratic extends TestCase
{
    const DEBUG_MODE = true;

    /**
     * @protected
     * @method echoCurTestInfo
     * @param {string} $function_name
     * @param {boolean} [$substrt=true]
     */
    protected function echoCurTestInfo($function_name, $substrt = true)
    {
        if (self::DEBUG_MODE) {
            if ($substrt) {
                $function_name = substr($function_name, 4);
            }

            $strInfo = 'Testing ' . $function_name;
            echo "> " . $strInfo ."\n";
        }
    }

    public function testSolve()
    {
        $this->echoCurTestInfo(__FUNCTION__);
        $this->assertSame([], Quadratic::solve(1, 0, 1));
    }
}