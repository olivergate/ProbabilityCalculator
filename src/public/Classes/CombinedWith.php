<?php

namespace pub\Classes;

use pub\Interfaces\getCalcResult;
use pub\Interfaces\getInputs;

class CombinedWith implements getCalcResult
{
    use \pub\Traits\validateInputProbTrait;
    use \pub\Traits\logArrayTrait;

    private $calcResult;
    private $inputs;
    private $outputs;

    /**
     * CombinedWith constructor. Validates the inputs then stores them inside the object.
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

    /**calc() is the mathematical calculation to find the probability of two independent events occurring.
     * Works by multiplying the two probabilities together => P(A)*P(B)
     *
     * @param $array array Containing the inputs inside. The floats inside of this array must be between one and
     * zero because they have all been through the validation function => validateInputProbabilities()
     *
     * @return float The result will be a float between one and 0.
     */
    public function calc(array $array) : float
    {
        $result = $array[0];
        $arrayLength = \count($array);
        for ($i=1; $i<$arrayLength; $i++){
            $result *= $array[$i];
        }
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
