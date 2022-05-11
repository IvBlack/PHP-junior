<?php
echo 'это простая строка';

echo 'Также вы можете вставлять в строки
символ новой строки вот так,
это нормально';

// Выводит: Однажды Арнольд сказал: "I'll be back"
echo 'Однажды Арнольд сказал: "I\'ll be back"';

// Выводит: Вы удалили C:\*.*?
echo 'Вы удалили C:\\*.*?';

// Выводит: Вы удалили C:\*.*?
echo 'Вы удалили C:\*.*?';

// Выводит: Это не будет развёрнуто: \n новая строка
echo 'Это не будет развёрнуто: \n новая строка';

// Выводит: Переменные $expand также $either не разворачиваются
echo 'Переменные $expand также $either не разворачиваются';

//several PHP functions for working with strings and their practical application:
//length:
$text = 'Съешь ещё - этих мягких французских булок, да выпей же чаю.';
echo strlen($text); // 105
echo mb_strlen($text); // 59

//amount of symbols without spaces:
$text = 'I have come to the conclusion - yes, I know.';
$str = mb_ereg_replace('[\s]', '', $text);
echo mb_strlen($str); // 49

//amount of letters:
$text = 'I have come to the conclusion - yes, I know.';
echo $str = preg_replace('/[^a-zа-яё]/ui', '', $text);
echo mb_strlen($str); // 46

//ocurence number of the substring
$text = 'I have come to the conclusion - yes, I know.';
echo mb_substr_count($text, 'I'); // 2
?>