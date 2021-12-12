<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Form</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
	function call() {
	  var msg   = $('#index').serialize();
       $.ajax({
         type: 'POST',
         url: 'index.php', //обращаемся к обработчику
         data: msg,
        success: function(data) {  //в случае успеха выводим результаты в div "results"
            $('#index').remove(); //скрываем форму после отправки 
            $('#results').html(data); //показываем сообщение об успехе вместо неё 
         },
         error:  function(xhr, str){ //ошибка выводит соответствующее сообщение 
	       alert('Возникла ошибка: ' + xhr.responseCode);
         }
       });
   }
  </script>
 </head>
 <body>

 <?php
// Наш обработчик ссылок
require_once('db.php');
$link = htmlspecialchars($_POST['link']);
if(empty($_POST['submit'])){}
if(empty($_POST['link'])){}
else{
    $stmt = $pdo->prepare("SELECT * FROM short WHERE url = ?");
    $stmt->execute([$link]);
    $select = $stmt->fetch(PDO::FETCH_LAZY);
if($select){
    //сборка нашей короткой ссылки для URL
    $result = [
      'url' => $select['url'],
      'key' => $select['short_key'],
      'link' => 'http://'.$_SERVER['HTTP_HOST'].'/-'.$select['short_key']
    ];
    print_r($result);
  }else{
    /*---- Генерация уникального ключа для корокой ссылки----*/
    $letters = 'qwertyuiopasdfghjklzxcvbnm1234567890';
    $url_id = substr(str_shuffle($letters), 0, 4);

    //пуш в БД нашей сборки 
    $data = array(NULL, "$link", "$url_id");
    $sth = $pdo->prepare("INSERT INTO short (id, url, short_key) VALUES (?, ?, ?) ");
    $sth->execute($data);

    //достаем сборку из БД и скриним на экран
    $stmt = $pdo->prepare("SELECT * FROM short WHERE url = ?");
    $stmt->execute([$link]);
    $select = $stmt->fetch(PDO::FETCH_LAZY);
    $result = [
    'url' => $select['url'],
    'key' => $select['short_key'],
    'link' => 'http://'.$_SERVER['HTTP_HOST'].'/-'.$select['short_key']
    ];
    print_r($result);
  }
}
?>
<!--- Наша форма ввода.
Ajax конфликтует с print-ами обработчика php, но работает и в БД инфу пишет.

<div id="results"> </div>
<form id="index" onsubmit="call()"> 
<legend>Cut the URL</legend> 
<label for="link">Your URL:</label>
<input id="link" name="link" placeholder="http://example.com" type="text">
<input value="Отправить" type="submit"> 
</form> --->

<!--- Работа обработчика без Ajax для отображения ссылок на странице --->
<form method="post" action=""> 
<label for="url">Enter an http:// URL:</label>
<input type="url" name="link" id="url" 
placeholder="http://example.com" 
pattern="http://.*" size="30" required> <!--- Валидация ввода url на стороне клиента --->
<input value="Отправить" type="submit"> 
</form>
</body>
</html>