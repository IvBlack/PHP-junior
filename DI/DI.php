<?php
error_reporting(-1);

//до рефакторинга_________________________________________________________________________________

/*
        $db = new PDO("mysql:host=localhost;dbname=lesson01", 'root', '');
        $statement = $db->query("SELECT * FROM users");
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement = $db->query("SELECT * FROM posts");
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        var_dump($users, $posts);*/


//небольшой рефакторинг________________________________________________________________
/*class QueryBuilder{
    public function select($table){
        $db = new PDO("mysql:host=localhost;dbname=lesson01", 'root', '');
        $statement = $db->query("SELECT * FROM $table");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

$db = new QueryBuilder;
$users = $db->select('users');
$posts = $db->select('posts');
var_dump($users, $posts);*/


//у нас есть БД с 2мя таблицами
//создаем соединение через PDO-интерфейс, выносим в отдельный класс
class Connection{
    public static function make()
    {
        $db = new PDO("mysql:host=localhost;dbname=lesson01", 'root', '');
        return $db;
    }
}


//получаем на вход таблицу, проверяем ее на предмет того, что это тип PDO
class QueryBuilder{
    private $db;
    
    public function __construct($pdo)//получаем объект PDO
    {
        $this->db = $pdo;
    }
    
    public function select($table)
    {
        $statement = $this->db->query("SELECT * FROM $table");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

//это уже dependencyInjection
//передаем в QueryBuilder объект PDO
$db = new QueryBuilder(Connection::make());
$users = $db->select('users');
$posts = $db->select('posts');
var_dump($users, $posts);