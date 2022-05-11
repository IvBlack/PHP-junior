<?php
$cake = NAN;
var_dump($cake);

/*
    PHP automatically convert values to bool, 
    if function, operator or construction
    requres bool argument.
*/

/*
    What is false?:
    - integer 0;
    - meaning false;
    - float 0.0 and -0.0 (minus zero);
    - empty string and string "0";
    - array without elements;
    - type NULL (unexpected variables);
    - SimpleXML objects (created from empty variables with no attributes);

    All other values are treated as true, including resource and NAN.
*/

var_dump((bool) "");
var_dump((bool) 1);
var_dump((bool) "0");
var_dump((bool) -2);
var_dump((bool) "foo");
var_dump((bool) 2.3e5);
var_dump((bool) array(35));
var_dump((bool) array());
var_dump((bool) "false");