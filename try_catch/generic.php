<?php

//фрагмент кода демонстрирует процесс выброса исключения
class Generic
{
    private $someVar;
    
    public function _construct($someVar)
    {
        $this->someVar = $someVar;
    }
    
    public function testValue($someOtherVar)
    {
        if($someOtherVar > 3) {
            throw new Exception('Значение параметра не может быть больше 3!');
        } else {
            echo $this->someVar + $someOtherVar;
        }
    }
}

#$gen = new Generic(3);
#$gen->testValue(5);

//Это произошло из-за отсутствия блока try-catch, добавим его:

/*try
{
    $gen = new Generic(3);
    $gen->testValue(5);
} catch (Exception $e) {
    // обработка исключения
    echo 'Поймали исключение<br />';
    echo 'Сообщение: '   . $e->getMessage() . '<br />';
    echo 'Wanna tell smth else?';
}*/

//для более детальной инфо используем методы объекта, сгенерированного в блоке catch
try
  {
        $gen = new Generic(3);
        $gen->testValue(4);
  } catch (Exception $e) {
        // code to handle the Exception
        echo 'Error :' . $e->getMessage() . '<br />';
        echo 'Code :' . $e->getCode() . '<br />';
        echo 'File :' . $e->getFile() . '<br />';
        echo 'Line :' . $e->getLine() . '<br />';
        exit();
  }

