<?php

namespace pub\Traits;

trait logArrayTrait
{
    public function logArray() : array
    {
        return $this->outputs = ['Date' => date('Y/m/d/h/i/s'), 'Function Name: ' => __FUNCTION__,  'Inputs: ' => $this->inputs,  'Output: ' => $this->outputs];
    }
}