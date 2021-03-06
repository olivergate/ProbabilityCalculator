<?php
namespace pub;

use pub\Classes\Calculator;


if (isset($_POST['input1'], $_POST['input2'], $_POST['input1'])) {
    //Assigning variables for readability.
    $inputs = array((float) $_POST['input1'], (float) $_POST['input2']);
    $function = $_POST['Function'];

    //Instantiating calculator and populating it with user data.
    $calculator = new Calculator();
    $calculator->getUserInputs($inputs);
    try {
        //fires off the calculation.
        $calculator->setFunction($function);
    } catch (\UnexpectedValueException $exception) {
        header('Location: ?invalid=1');
    }
    //stores the result for use on front end
    $result = $calculator->getResult();

    //prepares the log statement
    $calculator->logArrayStore();
    $calculator->logResult();
}