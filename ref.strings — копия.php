<?php error_reporting (-1);

header('Content-type: text/html; charset=utf-8');

//Функции для работы со строками
//https://www.php.net/manual/ru/ref.strings.php
#Строки широко используются для передачи информации: логинов, паролей, данных #форм


//explode — Разбивает строку с помощью разделителя

/*$str = 'Иванов Иван Иванович';
$data = explode(' ', $str);//третий параметр берет число элементов
print_r($data);
//echo $data[1];
echo "/_____________________________________________________//";*/

//implode — Объединяет элементы массива в строку

/*$data1 = ['Иванов', 'Иван', 'Иванович'];
echo $str = implode(',', $data1);
echo "<br />";
echo "/_____________________________________________________//";*/
    
//trim — Удаляет пробелы (или другие символы) из начала и конца строки
//ltrim — Удаляет пробелы (или другие символы) из начала строки
//rtrim — Удаляет пробелы (или другие символы) из конца строки
//chop — Псевдоним rtrim
#Удобно в форме при вводе пароля/логина

/*$str = "\n <p>Hello</p>";
$str .= "\n<p>world</p>\t\n";
//echo $str;
echo trim($str, "\t");//указывать можем любой символ в параметре
echo "/_____________________________________________________//";*/

//md5 — Возвращает MD5-хеш строки, шифрует строку
#Небезопасна на сегодня

/*$str = 'password';
echo md5(md5($str));
echo "<br />";
echo "/_____________________________________________________/";*/

//nl2br — Вставляет HTML-код разрыва строки перед каждым переводом строки
#Удобно при формировании формы комментов на сайте
    
/*$str = "Hello\nworld\n";
echo nl2br($str);
echo "/_____________________________________________________/";*/

//str_replace — Заменяет все вхождения строки поиска на строку замены
#полезно на пабликах при цензуре

/*$str = '[i]Привет[/i] ! Меня зовут [b]Вася[/b]!';
//$str = str_replace('[b]', '<b>', $str);//что, на что и где меняем
//$str = str_replace('[/b]', '[</b>]', $str);
//А можно проще
$search = ['[b]', '[/b]', '[i]', '[/i]'];
$replace = ['<b>', '</b>', '<i>', '</i>'];
//$str = str_replace($search, $replace, $str);
//Следующая ф-ция производит замену без учета регистра
$str = str_ireplace($search, $replace, $str);
echo $str;
echo "/_____________________________________________________/";*/

//strip_tags — Удаляет теги HTML и PHP из строки
/*$str = '<i>Привет</i>! Меня   <b>Вася!</b> <script>alert("xss")</script>';
echo strip_tags($str, '<b><i>');//второй параметр - исключение из удаления
echo "/_____________________________________________________/"*/

//strlen — Возвращает длину строки
/*$str = 'привет';
echo strlen($str);
//echo mb_strlen($str) "<br />";
echo "/_____________________________________________________/";*/
    
//mb_strpos - Возвращает позицию первого вхождения подстроки
# возвращает либо позицию искомуб либо false

/*$str = 'Привет, мир';
//var_dump(mb_strpos($str, '.', 0, 'utf-8'));
if (mb_strpos($str, 'П', 0, 'utf-8')) echo 'OK';
    else echo "NO <br />";

//в случае возврата функцией нуля, условие приравнивает его к false. Хотя 'П' найдена.
echo "/_____________________________________________________/";*/


//strtoupper, strtolower - верхний + нижний регистры

/*echo $str = 'привет, мир!<br />';
echo $str2 = 'ПРИВЕТ, МИР!<br />';

echo mb_strtoupper($str, 'utf-8');
echo mb_strtolower($str2, 'utf-8');
echo "/_____________________________________________________/";*/

//mb_substr - берет часть строки в заданной  строке
/*$str = 'Привет, мир!';
echo mb_substr($str, 0, 5, 'utf-8');
echo '<br />';
echo mb_substr($str, -6, 5, 'utf-8');
echo "/_____________________________________________________/";*/

//htmlspecialchars - деактивирует html_теги
/*$str = '<h1><i>Привет</i>! Меня зовут <b>Вася</b>!</h1><iframe hight="100%" width="100%">http://yandex.ru</iframe><script>alert(\'XSS\')</script>';
echo htmlspecialchars($str, ENT_QUOTES, 'utf-8', false);*/















