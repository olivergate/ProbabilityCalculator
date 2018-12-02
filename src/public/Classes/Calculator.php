<?php
namespace pub\Classes;

class Calculator
{
    private $probFunction;
    private $inputs;

    public function getUserInputs(array $inputs)
    {
        return $this->inputs = $inputs;
    }

    public function setFunction($function) : void
    {
        $function = 'pub\\Classes\\' . $function;
        $this->probFunction = new $function($this->inputs);
    }

    public function getResult()
    {
        return $this->probFunction->getCalcResult();
    }

    public function logArrayFetch()
    {
        return $this->probFunction->logArray();
    }

}