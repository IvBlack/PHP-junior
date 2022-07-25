<?php

class CsvParser {

    public $input;

    public function getInput() {
        return $this->input;
    }

    public function setInput($input) {
        $this->input = $input;
    }


    function parse() {
        $input = "data/input.csv";
        $fh = fopen($input, 'r');
    fgetcsv($fh, 1000, ';');

    // init empty arr
    $data = [];
    while (($row = fgetcsv($fh, 1000, ';')) !== false) {
        list($item, $type, $parent, $relation) = $row;

        $data[] = [
            'item' => $item,
            'type' => $type,
            'parent' => $parent,
            'relation' => $relation
        ];
    }

    foreach ($data as $row) {
        // => to json
        $x = json_encode($data, JSON_UNESCAPED_UNICODE);
        $data_i = json_decode($x, true);
        }
    //array of strings
    return $data_i;
    fclose($input);
    }
}

//var_dump($data_i);