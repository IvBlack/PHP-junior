/*
Floating point numbers ("float", "double", or "real") can be specified using the following kinds of syntax:
    $a = 1.234;
    $x = 1.2e3;
    $z = 7E-10;
    $d = 1_234.567; // begining from PHP 7.4.0
*/

//is_float($value) – checks if the value is a floating point number:

is_float(1);       // false
is_float(0.1);     // true
is_float(-1);      // false
is_float(-0.1);    // true
is_float('1');     // false
is_float('1abc');  // false
is_float('abc');   // false


/*
Never test for equality of floating point numbers. 
If you want really high precision calculations, 
you should use arbitrary-precision math functions or gmp, 
like gmp_abs or etc.
*/

    $abs1 = gmp_abs("274982683358");
     $abs2 = gmp_abs("-274982683358");

     echo gmp_strval($abs1) . "\n";
     echo gmp_strval($abs2) . "\n";