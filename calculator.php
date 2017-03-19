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

    private function typeOfWindow($typeOfwindow)
    {
        if (is_string($typeOfwindow)) {
            $this->setCsv(array_map('str_getcsv', file($typeOfwindow)));
        } else echo "Please enter string";
    }

    private function rangeHeight($height)
    {
        $getCSV = $this->getCsv();
        $num = count($getCSV);
        for ($i = 1; $i < $num; $i++) {

            $row = $getCSV[$i][0];
            $str = strpos($row, "-");
            $row = substr($row, $str+1);

            if ($row < $height) {
                return $i;
            }
        }
    }

    private function rangeWidth($width)
    {
        $getCSV = $this->getCsv();
        $num = count($getCSV);
        for ($i = 1; $i < $num; $i++) {

            $row = $getCSV[0][$i];
            $str = strpos($row, "-");
            $row = substr($row, 0, $str);

            if ($row > $width) {
                return $i;
            }
        }
    }

    public function getPosition ($type, $height, $width){
        $this->typeOfWindow($type);
        $h = $this->rangeHeight($height);
        $w = $this->rangeWidth($width);
        $csv = $this->getCsv();
        return $csv [$h] [$w];
}
}

//$csv = array_map('str_getcsv', file('type_1.csv'));
//$num = count($csv);
//$row = $csv [16] [0];
//$str = strpos($row, "-");
//$row = substr($row, $str+1);
//if ($row > 5000){
//    echo "lol";
//}else echo "неlol";
//
////var_dump($csv);
//echo $row;
//
//$row = 1;
//if (($handle = fopen("type_1.csv", "r")) !== FALSE) {
//    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//        $num = count($data);
//        echo "<p> $num полей в строке $row: <br /></p>\n";
//        $row++;
//        for ($c = 0; $c < $num; $c++) {
//            echo $data[$c] . "<br />\n";
//        }
//    }
//    fclose($handle);
//}