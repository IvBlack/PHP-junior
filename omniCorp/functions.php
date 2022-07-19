<?php

require_once 'csv.php';

//to parse input csf-file
function get_csv() {
    $fh = fopen('input.csv', "r");
    fgetcsv($fh, 0, ';');

    // init empty arr
    $data = [];
    while (($row = fgetcsv($fh, 0, ';')) !== false) {
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
    return $data_i;
    fclose($input);
}


//build 
function jsonTree($data_i) {
    $itemsByReference = array();

// Build array of item references:
foreach($data_i as $key => &$item) {
   $itemsByReference[$item['item']] = &$item;
   // Children array:
   $itemsByReference[$item['item']]['children'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
   //$itemsByReference[$item['item']]['data'] = new StdClass();
}

// Set items as children of the relevant parent item.
foreach($data_i as $key => &$item)
   if($item['parent'] && isset($itemsByReference[$item['parent']]))
      $itemsByReference [$item['parent']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
foreach($data_i as $key => &$item) {
   if($item['parent'] && isset($itemsByReference[$item['parent']]))
      unset($data_i[$key]);
}

$json = json_encode($data_i, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
return $json;
}




