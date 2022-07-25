<?php

include "src/Classes/CsvParser.php";
include "src/Classes/TreeBuilder.php";
include "src/Classes/jsonPushToFile.php";

$csvParser = new CsvParser();
$treeBuilder = new TreeBuilder();
$jsonConverter = new JsonPushToFile();

$input = $csvParser->setInput(__DIR__ . "/data/" .  $argv[1]);
$output = $jsonConverter->setOutput(__DIR__ . "/data/" .  $argv[2]);
$data_i = $csvParser->parse($input);
$tree = $treeBuilder->jsonBuild($data_i);
$json = $jsonConverter->push($tree);