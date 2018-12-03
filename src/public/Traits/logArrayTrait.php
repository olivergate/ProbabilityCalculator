<?php

namespace pub\Traits;

trait logArrayTrait
{
    /** Function logArray() creates an array of information tha tis ready for the logger to log.
     *
     * @return array
     */
    public function logArray() : array
    {
        return $this->outputs = [
            'Date: ' . date('Y/m/d H:i', time()),
            'Function Name: ' . __CLASS__,
            'Input1: ' . $this->inputs[0], 'Input2: ' . $this->inputs[1],
            'Output: ' . $this->calcResult
        ];
    }
}