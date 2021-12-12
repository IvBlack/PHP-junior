<?php
//редирект на готовую сцыль
require_once('db.php');
$key = htmlspecialchars($_GET['key']);
if(empty($_GET['key'])){}
else{
    $stmt = $pdo->prepare("SELECT * FROM short WHERE short_key = ?");
    $stmt->execute([$key]);
    $select = $stmt->fetch(PDO::FETCH_LAZY);
if($select){
    $result = [
    'url' => $select['url'],
    'key' => $select['short_key']
    ];
    // редиректимся на страницу URL-а
    header('location: '.$result['url']);
    }
}
?>