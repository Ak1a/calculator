<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 21.03.2017
 * Time: 16:53
 */

include ('calculator.php');
include ('json.php');

$calculator = new calculator();
$data = new Json();

$id = $_GET["id"];
echo $id;