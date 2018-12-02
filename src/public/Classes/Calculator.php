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

    public function evaluate()
    {
        return $this->probFunction->logArray();
    }

}