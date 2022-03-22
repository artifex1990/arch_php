<?php

use PHPUnit\Framework\TestCase;
use Architekt\Quadratic;
use Architekt\ZeroException;
use Architekt\NotNumericException;

class TestQuadratic extends TestCase
{
    const DEBUG_MODE = true;

    /**
     * @private
     * @method echoCurTestInfo
     * @param {string} $function_name
     * @param {boolean} [$substrt=true]
     */
    private function echoCurTestInfo($function_name, $substrt = true)
    {
        if (self::DEBUG_MODE) {
            if ($substrt) {
                $function_name = substr($function_name, 4);
            }

            $strInfo = 'Testing ' . $function_name;
            echo "> " . $strInfo . PHP_EOL;
        }
    }

    public function testDontRootsEquations()
    {
        $this->echoCurTestInfo(__FUNCTION__);
        $this->assertSame([], Quadratic::solve(1, 0, 1));
    }

    public function testTwoRootsEquations()
    {
        $this->echoCurTestInfo(__FUNCTION__);
        $this->assertSame([1.0, -1.0], Quadratic::solve(1, 0, -1));
    }

    public function testOneRootsEquations()
    {
        $this->echoCurTestInfo(__FUNCTION__);
        $this->assertSame([-0.00000001], Quadratic::solve(0.0001, 0.0002, 0.0001));
    }

    public function testCoeffAMustDontEqualZero()
    {
        $this->echoCurTestInfo(__FUNCTION__);
        $this->expectException(ZeroException::class);

        Quadratic::solve(0, 2, 1);
    }

    public function testIsNanNumeric()
    {
        $this->echoCurTestInfo(__FUNCTION__);
        $this->expectException(NotNumericException::class);

        Quadratic::solve(acos(1.01), 2, 1);
    }

    public function testIsInfiniteNumeric()
    {
        $this->echoCurTestInfo(__FUNCTION__);
        $this->expectException(NotNumericException::class);

        Quadratic::solve(log(0), 2, 1);
    }

    public function testIsNanAndInfiniteNumeric()
    {
        $this->echoCurTestInfo(__FUNCTION__);
        $this->expectException(NotNumericException::class);

        Quadratic::solve(log(0), 3, acos(1.01));
    }
}