<?php

namespace Classes;

class CombinedWith
{
    use \validateInputProbTrait;

    private $calcResult;
    private $inputs;
    private $outputs;

    public function __construct(array $inputs)
    {
        $this->validateInputProbabilities($inputs);
        $this->inputs = $inputs;
    }


    public function Calc($array) : array {
        $result = $array[0];
        $arrayLength = count($array);
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

    public function logArray() : array
    {
        return ['Date' => date('Y/m/d/h/i/s'), 'Function Name: ' => __FUNCTION__,  'Inputs: ' => $this->inputs,  'Output: ' => $this->outputs];
    }
}
