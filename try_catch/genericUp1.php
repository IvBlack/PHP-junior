<?php

#добавим немного гибкости скрипту
#для этого добавим условие в блок catch, в зависимости от типа которого будут генерироваться сбщ

class Generic
{

    #константы - наши вторые переменные в блоках catch
    private   $someVar, $result;
    const     NUM_ERROR       = 1;
    const     ANY_ERROR       = 2; 

    public function __construct($someVar)
    {
        $this->someVar = $someVar;
    }

    public function testValue($someOtherVar)
    {
        if($someOtherVar > 3) {
            throw new Exception('Значение параметра не божет быть больше 3!', self::NUM_ERROR);
        } else {
            $this->result = $this->someVar + $someOtherVar;
            echo $this->result . '<br />';
        }
    }

    public function otherMethod()
    {
        if($this->result > 4) {
            throw new Exception('Результат больше 4.', self::ANY_ERROR);
        }
    }
}

// Запустим блок и передадим параметры
try
{
      $gen = new Generic(3);
      $gen->testValue(3);
      $gen->otherMethod();
} catch (Exception $e) {
      if($e->getCode() == 1) {
          die ($e->getMessage());
      } else {
          echo 'Error :' . $e->getMessage() . '<br />';
          echo 'File :' . $e->getFile() . '<br />';
          echo 'Line :' . $e->getLine() . '<br />';
          exit();
      }
}