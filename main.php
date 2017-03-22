<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 21.03.2017
 * Time: 16:53
 */

include_once('calculator.php');
include_once('json.php');

$calculator = new calculator();
$json = new Json();

$id = $_GET["id"];

if ($id == 'user') {

    $type = $_GET["type"];
    $height = $_GET["height"];
    $width = $_GET["width"];

    $lamination = $json->getJsonData($_GET["lamination"]);
    $discount = $json->getJsonData("discount");

    $res = $calculator->calculate($type, $height, $width, $lamination, $discount);
    echo $res;

} else {
    $input_data_to_change = $_GET["input_data_to_change"];
    $type = $_GET["type"];
   // $oldValue = $_GET["old_value"];

   $json->updateJsonData($type, $input_data_to_change);

}