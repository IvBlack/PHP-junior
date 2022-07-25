<?php

class TreeBuilder {

    public $data_i;

    function jsonBuild($data_i) {
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
    
    $jsonTree = json_encode($data_i, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    return $jsonTree;
    }
}