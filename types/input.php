<?php
//we have 10 types in php.
//If you need to check type of any expression, use var_dump:

$perem = 'World, r u there??';
var_dump($perem);

//We can use var_dump() throuth echo operator.
//Let's collect function:

function var_dumps($var) {
    ob_start();
    var_dump($var);
    $var = ob_get_contents();
    ob_end_clean();
    return($var);
}
echo var_dumps('Is everybody here?');


//we can use gettype() to take usable representation:
$a_bool = TRUE; //logical
$a_str = "foo"; //string
$a_str2 = 'foo'; //same
$an_int = 9; //integer

echo gettype($a_bool);
echo gettype($a_str);

//is_type - if we need to check definite type:
if(is_int($an_int)) {
    $an_int += 4;
}

if(is_string($a_str2)) {
    echo "String is: $a_str2";
}

//if we wanna change variable type we can use settype():
$foo = "5bar"; //string
$bar = true; //bool

settype($foo, "integer"); //$foo is int now
settype($bar, "string"); //$bar is "1" now