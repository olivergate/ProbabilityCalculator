<?php

namespace pub\Classes;

use pub\Interfaces\getCalcResult;
use pub\Interfaces\getInputs;

class CombinedWith implements getCalcResult, getInputs
{
    use \pub\Traits\validateInputProbTrait;
    use \pub\Traits\logArrayTrait;

    private $calcResult;
    private $inputs;
    private $outputs;

    public function __construct(array $inputs)
    {
        $this->validateInputProbabilities($inputs);
        $this->inputs = $inputs;
        $this->calcResult = $this->calc($inputs);
    }

    public function calc($array) : array {
        $result = $array[0];
        $arrayLength = \count($array);
        for ($i=1; $i<$arrayLength; $i++){
            $result *= $array[$i];
        }
        return $this->calcResult = $result;
    }

    /**
     * @return mixed
     */
    public function getCalcResult()
    {
        return $this->calcResult;
    }

    /**
     * @return array
     */
    public function getInputs(): array
    {
        return $this->inputs;
    }



}
