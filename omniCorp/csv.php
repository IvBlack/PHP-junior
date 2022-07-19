<?php 
require_once 'functions.php';

$input = __DIR__ . "/" . $argv[1];
$output = __DIR__ . "/" . $argv[2];
$x = get_csv($input);
$y = jsonTree($x);
file_put_contents('output.json', $y);
