<?php

/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 20.03.2017
 * Time: 22:14
 */
class json
{
    function __construct()
    {
    }


    /**
     * Принимаем ключ значение и добавляем его в json файл
     * @param string $key
     * @param string $value
     */
    public function addJsonData($key, $value)
    {
        $file = file_get_contents('config/package.json');  // Открыть файл data.json

        $taskList = json_decode($file, TRUE);        // Декодировать в массив

        unset($file);                               // Очистить переменную $file

        $taskList[] = array($key => $value);        // Представить новую переменную как элемент массива, в формате 'ключ'=>'имя переменной'

        file_put_contents('config/package.json', json_encode($taskList));  // Перекодировать в формат и записать в файл.

        unset($taskList);
    }


    /**
     * Принимаем ключ и новое значение и обновляем элемент
     * @param string $key
     * @param string $newvalue
     */
    public function updateJsonData($key, $newvalue)
    {

        $file = file_get_contents('config/package.json');     // Открыть файл data.json

        $taskList = json_decode($file, TRUE);              // Декодировать в массив

        $count = count($taskList);
        for ($i = 0; $i < $count; $i++) {
            if (isset($taskList[$i][$key])) {
                 $taskList[$i][$key]= $newvalue;
            }
        }

        file_put_contents('config/package.json', json_encode($taskList)); // Перекодировать в формат и записать в файл.

        unset($taskList);  // Очистить переменную $taskList
    }

    /**
     * Удалаем элемент по ключу
     * @param string $current
     */
    public function deleteJsonData($current)
    {
        $file = file_get_contents('config/package.json');         // Открыть файл data.json

        $taskList = json_decode($file, TRUE);                  // Декодировать в массив
        foreach ($taskList as $key => $value) {        // Найти в массиве
            if (in_array($current, $value)) {           // Переменную $current

                unset($taskList[$key]);             // после обнаружения удалить
            }
        }

        file_put_contents('config/package.json', json_encode($taskList)); // Перекодировать в формат и записать в файл.

        unset($taskList);                           // Очистить переменную $taskList
    }


    /**
     * Получаем значение по ключу
     * @param string $key
     * @return mixed
     */
    public function getJsonData($key)
    {
        $file = file_get_contents('config/package.json');         // Открыть файл data.json

        $taskList = json_decode($file, TRUE);
        $count = count($taskList);
        for ($i = 0; $i < $count; $i++) {
            if (isset($taskList[$i][$key])) {
                return $taskList[$i][$key];
            }
        }
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}



