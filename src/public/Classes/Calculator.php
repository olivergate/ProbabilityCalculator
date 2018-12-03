<?php
namespace pub\Classes;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Calculator
{
    private $probFunction;
    private $inputs;
    private $logArray;

    /** public Function getUserInputs() takes a parameter $inputs (which is the user entered values) and then stores
     * them in the calculator.
     *
     * @param array $inputs
     * @return array
     */
    public function getUserInputs(array $inputs) : array
    {
        return $this->inputs = $inputs;
    }

    /** Function setFunction() instantiates an object according to it's input and store it inside the calculator
     *
     * @param $function
     *
     * @return returns an object with the trait logArrayTrait
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

    /** Function logArrayFetch() calls the Trait function logArray() from logArrayTrait which returns an array which is
     * formatted for logging. This is stored locally for use in logResult.
     *
     * @return array
     */
    public function logArrayStore() :array
    {
        return $this->logArray = $this->probFunction->logArray();
    }

    /**lFunction LogResult() takes the log array and passes it to monolog which stores it in file.log.
     *
     */
    public function logResult() : void
    {
        $log = implode(' ', $this->logArray);
        $logger = new Logger('Results');
        $logger->pushHandler(new StreamHandler('file.log', Logger::DEBUG));
        $logger->addInfo($log);
    }

}