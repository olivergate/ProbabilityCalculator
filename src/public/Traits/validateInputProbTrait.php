<?php

namespace pub\Traits;

trait validateInputProbTrait
{
    /**Function validateInputProbabilities() takes inputs and figures out if they are probabilities between 0 and 1
     * If they are not it throws an error.
     *
     * @param $inputs an array of values.
     */
    private function validateInputProbabilities($inputs) : void {
        foreach ($inputs as $input) {
            if($input < 0 || $input > 1) {
                throw new \UnexpectedValueException('Invalid Probability');
            }
        }
    }
}