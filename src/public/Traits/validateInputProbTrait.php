<?php

namespace pub\Traits;

trait validateInputProbTrait
{
    private function validateInputProbabilities($inputs) : void {
        foreach ($inputs as $input) {
            if($input < 0 || $input > 1) {
                throw new \UnexpectedValueException('Invalid Probability');
            }
        }
    }
}