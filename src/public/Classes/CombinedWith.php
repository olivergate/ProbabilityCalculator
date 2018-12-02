<?php

namespace Classes;

class CombinedWith
{
    use \validateInputProbTrait;

    private $calcresult;
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
        return $this->calcresult = $result;
    }

    /**
     * @return mixed
     */
    public function getCalcresult()
    {
        return $this->calcresult;
    }

    public function __toString()
    {
        return "Funation Name: " . __FUNCTION__ .  "Inputs: " . $array . "Output: " . $;
    }
}
