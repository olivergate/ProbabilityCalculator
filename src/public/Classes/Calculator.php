<?php

namespace pub\Classes;

use pub\Traits\logArrayTrait;

class Calculator
{
    private $function;
    private $inputs;

    public function __construct($inputs = array())
    {
        $this->inputs = $inputs;
    }


    public function setFunctionName(logArrayTrait $function) : void
    {
        $this->function = new $function($this->inputs);
    }

    public function evaluate()
    {
        return $this->function->logArray($this->inputs);
    }

}