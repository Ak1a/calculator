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
     * Получить значение переменной $csv
     * @return mixed
     */
    public function getCsv()
    {
        return $this->csv;
    }

    /**
     * Присвоить значение переменной $csv
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
     * Парсинг csv файла
     * @param $typeOfWindow
     */
    private function typeOfWindow($typeOfWindow)
    {
        if (is_string($typeOfWindow)) {
            $this->setCsv(array_map('str_getcsv', file($typeOfWindow)));
        } else echo "Please enter string";
    }

    /**
     * Получаем высоту окна от клиента находим ее в таблице csv, возвращаем ее позицию
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
     * Получаем ширину окна от клиента находим ее в таблице csv, возвращаем ее позицию
     * @param $width
     * @return int
     */
    private function rangeWidth($width)
    {
        $getCSV = $this->getCsv();
        $num = count($getCSV [0]);
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
     * Получаем высоту окна от клиента, получаем ширину окна от клиента и тип окна, в таблице csv находим цену по позициям
     * возвращаем ее клиенту
     * @param string $type
     * @param $height
     * @param $width
     * @return float
     */
    public function getPrice($type, $height, $width)
    {
        $this->typeOfWindow($type);
        $h = $this->rangeHeight($height);
        $w = $this->rangeWidth($width);
        $csv = $this->getCsv();
        $res = $csv [$h] [$w];
        $res = (float)str_replace(',', '.', $res);
        return $res;
    }

    /**
     * Вывод конечной цены
     * @param string $type Тип окна
     * @param $height
     * @param $width
     * @param int $lan
     * @param int $dis
     * @return float
     */
    public function calculate($type, $height, $width, $lan, $dis)
    {
        $pr = (float)$this->getPrice($type, $height, $width);
        $lan = "0." . $lan;
        $dis = "0." . $dis;
        $pr = $pr + ($pr * (float)$lan);
        $price = $pr - ($pr * (float)$dis);

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

