<?php

/*
    In this situation a local variable will be created in 
    the user-defined function, which coinsides with the name of global variable.
    but this local variabl will be available only inside this
    user-defined function. 
*/
$a = 100;

function funct() {
    $a = 100;
    echo "<h4>$a</h4>";
}

funct();
echo "<h2>$a</h2>";

/*
    Here's a GLOBAL instruction. It allows a user-defined function
    to work with global variables.
    All references to any of these vars will point
    to their global version. =>
*/

$a = 10;
$b = 20;

function sum(){
    global $a, $b;
    $b = $a + $b;
}
sum();
echo $b;

/*
    The second way to access variables of global scope
    is using special PHP-defined GLOBALS array. Just like this:
*/

$a = 10;
$b = 20;

function G_sum() {
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

G_sum();
echo $b;


/*
    $GLOBALS is a superglobal array.
    It exists in any scope. Take a look at it:
*/

function test_global() {
    global $HTTP_POST_VARS;

    echo $HTTP_POST_VARS['name'];

    //superglobal var $_GET, it doesn't require 
    //'global' to be specified
    echo $_GET['name'];
}

/*
    Main advantage of local vars is absence of
    unforseen situations associated with accidental or 
    intentional modification of a global var.
    This script won't generate any output.
*/

$a = 1; //global scope

function test_local() {
    echo $a; //link to var of a local scope
}

test_local();

/*
    ...but this script will generate '1'
*/

$a = 1; //global scope

function test_local2() {
    global $a; //now $a is a global var
    echo $a; 
}

test_local2();