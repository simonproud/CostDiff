<?php
/*
 * Copyright 2019 TestingForMe simon.proud@ro.ru
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class CostDiff
{
    public $diff;
    public $actual;
    public $last;
    private $res;
    private $amount;
    
    /**
      * Для работы остальных функций все параметры задаются тут.
      * @param int $diff - разница в процентах между $actual и $last
      * @param int $actual - актуальная (новая цена)
      * @param int $last - предыдущая (старая цена) по умолчанию равна 1
      * @param int $res - подстановочное число.
    **/
    public function __construct($diff, $actual, $last = 1, $res = 0){
        $this->diff = $diff;
        $this->actual = $actual;
        $this->last = $last;
        $this->res = $res;
        $this->amount = 0;
        $this->diff();
    }
    
    /**
      * Функция вычисления, впервые вызывается при конструкте класса,
      * дальнейший вызов требуется только в случае смены значений
      * переменных $diff, $actual или $last. 
      *
      * В случае если задан $res результат вычислений заменяется на $res
      * @return bool - возвращает false в случае если отклонение в % больше $diff
    **/
    public function diff (){
    
        $b = $this->actual;
        $a = $this->last;
        $proc = (($b-$a)/$a) * 100;
        
        if($this->res != null){$proc = $this->res;}
        
        $this->amount = $proc;
       
         if($proc > ($this->diff) || ($proc < (-$this->diff))){
            return false;
         }else{
            return true;
         }
         
    }
    
     /**
      * Функция вычисления, впервые вызывается при конструкте класса,
      * дальнейший вызов требуется только в случае смены значений
      * переменных $diff, $actual или $last.
      * @return float - возвращает результат вычислений.
    **/
    public function getAmount (){return $this->amount;}
    
}

?>
