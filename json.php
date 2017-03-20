<?php

/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 20.03.2017
 * Time: 22:14
 */
class Json
{
    function __construct()
    {
    }


    /**
     * @param $name
     */
    public function addJsonData($name)
    {
        $file = file_get_contents('config/package.json');  // Открыть файл data.json

        $taskList = json_decode($file, TRUE);        // Декодировать в массив

        unset($file);                               // Очистить переменную $file

        $taskList[] = array('name' => $name);        // Представить новую переменную как элемент массива, в формате 'ключ'=>'имя переменной'

        file_put_contents('config/package.json', json_encode($taskList));  // Перекодировать в формат и записать в файл.

        unset($taskList);
    }

    /**
     * @param $oldname
     * @param $name
     */
    public function updateJsonData($oldname, $name)
    {
        $oldname = trim($oldname);               // Имя переменной которую нужно обновить

        $newname = trim($name);                // Имя переменной которой обновим старое значение

        $file = file_get_contents('config/package.json');     // Открыть файл data.json

        $taskList = json_decode($file, TRUE);              // Декодировать в массив

        foreach ($taskList as $key => $value) {    // Найти в массиве

            if (in_array($oldname, $value)) {    // Совпадение значения переменной

                $taskList[$key] = array('name' => $newname);  // Присвоить новое значение
            }
        }

        file_put_contents('config/package.json', json_encode($taskList)); // Перекодировать в формат и записать в файл.

        unset($taskList);  // Очистить переменную $taskList
    }

    /**
     * @param $current
     */
    public function deleteJsonData($current){
        $file = file_get_contents('config/package.json');         // Открыть файл data.json

        $taskList=json_decode($file,TRUE);                  // Декодировать в массив
        var_dump($taskList);
        echo "<br>";
        foreach ( $taskList as $key => $value){        // Найти в массиве
                var_dump($value);
                echo "<br>";
                var_dump($current);
            if (in_array( $current, $value)) {           // Переменную $current

                unset($taskList[$key]);             // после обнаружения удалить
            }
        }

        file_put_contents('config/package.json',json_encode($taskList)); // Перекодировать в формат и записать в файл.

        unset($taskList);                           // Очистить переменную $taskList
    }

    /**
     *
     */
    public function getJsonData (){
        $file = file_get_contents('config/package.json');         // Открыть файл data.json

        $taskList=json_decode($file,TRUE);
        foreach ( $taskList as $key => $value){
            echo "<br>".$value["name"];
        };
        var_dump($taskList);
        echo "<br>";
       // echo "<br>".$json_a->{"name"};
       // echo "<br>".$taskList["name"];
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}

$json = new Json();

//$json->addJsonData("lol");
$json->getJsonData();
//
//$json->updateJsonData("lol","kek");
//
$json->deleteJsonData("kek");