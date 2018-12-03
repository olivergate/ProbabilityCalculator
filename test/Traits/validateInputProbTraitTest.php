<?php

require_once '../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use pub\Traits\validateInputProbTrait;

class validateInputProbTraitTest extends TestCase
{
    public function validateInputProbabilitiesSuccesTest() : void
    {
        $inputs = [0.1, 0.1];
        $mock = $this->getMockForTrait(validateInputProbTrait::class);
        $case = $mock->validateInputProb($inputs);
        $expected = [0.1, 0.1];
        $this->assertEquals($expected, $case);
    }

    public function validateInputProbabilitiesFailTest() : void
    {
        $this->expectException(UnexpectedValueException::class);
        $inputs = [1.2, 0.1];
        $mock = $this->getMockForTrait(validateInputProbTrait::class);
        $case = $mock->validateInputProb($inputs);
    }

    public function validateInputProbabilitiesNegativeFailTest() : void
    {
        $this->expectException(UnexpectedValueException::class);
        $inputs = [-0.4, 0.1];
        $mock = $this->getMockForTrait(validateInputProbTrait::class);
        $case = $mock->validateInputProb($inputs);
    }
}
