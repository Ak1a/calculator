<?php

/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 18.03.2017
 * Time: 17:01
 */
include ('json.php');
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

    /**
     * Вывод конечной цены
     * @param string $type Тип окна
     * @param int $height
     * @param int $width
     * @param int $lamination
     * @param int $discount
     * @return mixed
     */
    public function calculate($type, $height, $width, $lamination, $discount)
    {
        $json = new Json();
        $pr = $this->getPrice($type,$height,$width);
        $lan = $json->getJsonData($lamination);
        $lan = "0.".$lan;
        $dis = $json->getJsonData($discount);
        $dis = "0.".$dis;

        $pr = $pr + ($pr * $lan);

        $price = $pr - ($pr * $dis);

        return $price;
    }

    /**
     *
     */
    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}

