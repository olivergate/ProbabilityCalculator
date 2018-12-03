<?php

namespace pub\Classes;

use pub\Interfaces\getCalcResult;

class InclusiveEither implements getCalcResult
{
    use \pub\Traits\validateInputProbTrait;
    use \pub\Traits\logArrayTrait;

    private $calcResult;
    private $inputs;
    private $outputs;

    /**
     * IInclusiveEither constructor. Validates the inputs then stores them inside the object.
     * Following this it fires off and stores the calculation function.
     *
     * @param array $inputs
     */
    public function __construct(array $inputs)
    {
        $this->validateInputProbabilities($inputs);
        $this->inputs = $inputs;
        $this->calcResult = $this->calc($inputs);
    }

    /**calc() is the mathematical calculation the probability of the union of two probabilities so that at least one
     * and possibly both occur.
     *
     * Initially check that the array has only two values to work with.
     * Works by adding the two probabilities together and subtracting the product of the two => P(A)+P(B) - P(A)*P(B)
     *
     * @param $array array Containing the inputs inside. The floats inside of this array must be between one and
     * zero because they have all been through the validation function => validateInputProbabilities()
     *
     * @return float The result will be a float between one and 0.
     */
    public function calc(array $array) : float
    {
        if (count($array)>2){
            throw new \UnexpectedValueException('too many inputs');
        }
        [$input1, $input2] = $array;
        $result = $input1 + $input2 - $input1*$input2;

        return $this->calcResult = $result;
    }

    /**getCalcResult() returns the result of the Calculation stored in the object.
     *
     * @return float
     */
    public function getCalcResult() : float
    {
        return $this->calcResult;
    }
}
