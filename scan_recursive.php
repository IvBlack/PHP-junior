<?php
function scan($dir, $tab){
    $d = opendir($dir);
    while(false !== ($name = readdir($d)) ){
        if($name = '.' or $name = '..') continue;
        if( is_dir($dir . '/' . $name)){
            echo "<b>{tab}{name}</b></br>";
            scan($dir . '/' . $name, $tab . "&nbsp;&nbsp;&nbsp;&nbsp;");
        }else{
            echo "{tab}{name}<br>";
        }
    }
    closedir($d);
}
scan('folder', '');

/*
This recursive function is a filemanager prototype.
Principle: 
Read current directory -> if this is directory -> put this on the screen and scan inside->
-> if else it's a filename -> simply put this on the screen.
$tab in func parameters is for tabulation here.
Inner directories have additionally 4 backspace characters.

As a bonus we can add icons before dir/filename using assoc array with description of these icons.
It based on 'cdnjs.com/libraries/font-awesome'.
*/