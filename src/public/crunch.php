<?php
require_once '../../vendor/autoload.php';

$inputs = array((float) $_POST['input1'], (float) $_POST['input2']);
$function = $_POST['Function'];
$calculator = new \pub\Classes\Calculator();
$calculator->getUserInputs($inputs);
$calculator->setFunction($function);
var_dump($calculator->evaluate());