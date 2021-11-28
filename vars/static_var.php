<?php

/*
    Static var exists only in local scope of the function
    but doesn't lose its value when program execution
    goes out of the scope:
*/

function funct() {
    static $int = 0;
    static $int = 1+2;
    // static $int = sqrt(121); wrong cuz it's expression

    $int++;
    echo $int . "<br />";
}
funct();


// example of a user-defined func with static var:
function user_static() {
    static $a;
    $a++;
    echo $a;
} for($i=0; $i++<10;) user_static();

/*
    this script outputs the line 12345678910
    but if we remove 'static' statement,
    output is 1111111111.
    $a variable will be deleted at the end of the function
    and reset to zero each time it is called.
*/