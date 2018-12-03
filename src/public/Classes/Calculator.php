<?php
namespace pub\Classes;

use pub\Traits\logArrayTrait;

class Calculator
{
    private $probFunction;
    private $inputs;

    public function getUserInputs(array $inputs)
    {
        return $this->inputs = $inputs;
    }

    /** Function setFunction() instantiates an object according to it's input and store it inside the calculator
     *
     * @param $function
     *
     * @return logArrayTrait returns an object with the trait logArrayTrait
     */
    public function setFunction(string $function)
    {
        $function = 'pub\\Classes\\' . $function;
        return $this->probFunction = new $function($this->inputs);
    }

    /**Function getResult() retrieves the result of the calculation from the instantiated object.
     * @return mixed
     */
    public function getResult()
    {
        return $this->probFunction->getCalcResult();
    }

    public function logArrayFetch()
    {
        return $this->probFunction->logArray();
    }

}