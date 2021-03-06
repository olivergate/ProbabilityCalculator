<?php

require_once '../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use pub\Classes\InclusiveEither;

class InclusiveEitherTest extends TestCase
{

    public function testConstructSuccess() : void
    {
        $array = [0.1, 0.1];
        $case = new InclusiveEither($array);
        $expected = InclusiveEither::class;
        $this->assertInstanceOf($expected, $case);
    }
    public function testConstructFailure() : void {
        $this->expectException(UnexpectedValueException::class);
        $array = [2, 0.1];
        new InclusiveEither($array);
    }

    public function testConstructNegativeNumberFailure() : void {
        $this->expectException(UnexpectedValueException::class);
        $array = [-0.1, 0.1];
        new InclusiveEither($array);
    }

    public function testSuccessCalc() : void {
        $array = [0.1, 0.1];
        $either = new InclusiveEither($array);

        $case = $either->calc($array);
        $expected = 0.19;
        $this->assertEquals($expected, $case);
    }

    public function testIncorrectInputCalc() : void  {
        $this->expectException(UnexpectedValueException::class);
        $array = [1.1, 0.1];
        $either = new InclusiveEither($array);
        $case = $either->calc($array);
        $expected = 0.01;
        $this->assertEquals($expected, $case);
    }
}
