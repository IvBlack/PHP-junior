<?php

class jsonPushToFile {
    public $output;

    public function setOutput($output) {
        $this->output = $output;
    }

    function push($tree) {
        //$output = __DIR__ . "/data" . $argv[2];
        return file_put_contents('data/output.json', $tree);
    }
}