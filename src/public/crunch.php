<?php
namespace pub;

if (isset($_POST['input1'], $_POST['input2'], $_POST['input1'])) {
    $inputs = array((float) $_POST['input1'], (float) $_POST['input2']);
    $function = $_POST['Function'];
    $calculator = new \pub\Classes\Calculator();
    $calculator->getUserInputs($inputs);
    try {
    $calculator->setFunction($function);
    } catch (\UnexpectedValueException $exception) {
        header('Location: /Redington/Redington?invalid=1');
    }
    $log = $calculator->logArrayFetch();
    $result = $calculator->getResult();
}