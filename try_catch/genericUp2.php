<?php

#мы можем так же создавать свои типы исключений
#для этого сделаем доп/класс CustomException, кот будет наследовать класс exception
#и в нем реализуем наши типы исключений

class Generic
  {

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
              throw new CustomException('Значение параметра не божет быть больше 3!', self::NUM_ERROR);
          } else {
              $this->result = $this->someVar + $someOtherVar;
              echo $this->result . '<br />';
          }
      }

      public function otherMethod()
      {
          if($this->result > 4) {
              throw new CustomException('Результат больше 4.', self::ANY_ERROR);
          }
      }
  }

  class CustomException extends Exception
  {

      public function logError()
      {
            // Записать в логи сервера
            if($this->getCode() == Generic::NUM_ERROR){
                error_log($this->getMessage(), 0);
            }
            // Сообщить админу по email
            else if($this->getCode() == Generic::ANY_ERROR){
                error_log($this->getMessage(), 1, 'ivbl21@ya.ru');
            }
      }
}

  // Отлавливаем 
  try
  {
        $gen = new Generic(3);
        $gen->testValue(3);
        $gen->otherMethod();
  } catch (CustomException $e) {
        $e->logError(); //вызываем функцию logError  с одним из ее параметров, стр. 40
  }