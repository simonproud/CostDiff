<?php 
require_once('classes/mathclass.php');

$math = new CostDiff(30, 90, 100);
$math->diff();

var_dump($math->getAmount());
?>
