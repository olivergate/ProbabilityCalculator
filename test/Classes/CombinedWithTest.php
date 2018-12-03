<?php
require_once '../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use pub\Classes\CombinedWith;

class CombinedWithTest extends TestCase
{
    public function testConstructSuccess() : void
    {
        $array = [0.1, 0.1];
        $case = new  CombinedWith($array);
        $expected = pub\Classes\CombinedWith::class;
        $this->assertInstanceOf($expected, $case);
    }
    public function testConstructFailure() : void {
        $this->expectException(UnexpectedValueException::class);
        $array = [2, 0.1];
        new CombinedWith($array);
    }

    public function testConstructNegativeNumberFailure() : void {
        $this->expectException(UnexpectedValueException::class);
        $array = [-0.1, 0.1];
        new CombinedWith($array);
    }

    public function testSuccessCalc() : void {
        $array = [0.1, 0.1];
        $combined = new CombinedWith($array);

        $case = $combined->calc($array);
        $expected = 0.01;
        $this->assertEquals($expected, $case);
    }

    public function testIncorrectInputCalc() : void  {
        $this->expectException(UnexpectedValueException::class);
        $array = [1.1, 0.1];
        $combined = new CombinedWith($array);
        $case = $combined->calc($array);
        $expected = 0.01;
        $this->assertEquals($expected, $case);
    }
}
