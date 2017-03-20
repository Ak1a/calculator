<?php

/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 18.03.2017
 * Time: 17:01
 */
class calculator
{
    private $csv;

    /**
     * @return mixed
     */
    public function getCsv()
    {
        return $this->csv;
    }

    /**
     * @param mixed $csv
     */
    public function setCsv($csv)
    {
        $this->csv = $csv;
    }

    /**
     * calculator constructor.
     */
    function __construct()
    {
    }

    /**
     * @param $typeOfwindow
     */
    private function typeOfWindow($typeOfwindow)
    {
        if (is_string($typeOfwindow)) {
            $this->setCsv(array_map('str_getcsv', file($typeOfwindow)));
        } else echo "Please enter string";
    }

    /**
     * @param $height
     * @return int
     */
    private function rangeHeight($height)
    {
        $getCSV = $this->getCsv();
        $num = count($getCSV);
        for ($i = 1; $i < $num; $i++) {
            $row = $getCSV[$i][0];
            $str = strpos($row, "-");
            $row = substr($row, $str + 1);
            if ($row >= $height) {
                return $i;
            }
        }
    }

    /**
     * @param $width
     * @return int
     */
    private function rangeWidth($width)
    {
        $getCSV = $this->getCsv();
        $num = count($getCSV);
        for ($i = 1; $i < $num; $i++) {
            $row = $getCSV[0][$i];
            $str = strpos($row, "-");
            $row = substr($row, $str + 1);
            if ($row >= $width) {
                return $i;
            }
        }
    }

    /**
     * @param $type
     * @param $height
     * @param $width
     * @return mixed
     */
    public function getPrice($type, $height, $width)
    {
        $this->typeOfWindow($type);
        $h = $this->rangeHeight($height);
        $w = $this->rangeWidth($width);
        $csv = $this->getCsv();
        $res = $csv [$h] [$w];
        return $res;
    }

    public function calculate()
    {


    }

    /**
     *
     */
    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}

//
//$csv = array_map('str_getcsv', file('type_1.csv'));
//$num = count($csv);
//$row = $csv [16] [0];
//$str = strpos($row, "-");
//$row = substr($row, $str + 1);
//if ($row > 5000) {
//    echo "lol";
//} else echo "не lol";
//
////var_dump($csv);
//echo $row."<br>";

$lol = new calculator();

$type = $_GET["type"];
$height = $_GET["height"];
$width = $_GET["width"];
$var = $lol->getPrice($type, $height, $width);
echo "<h2>".$var."</h2>";