<?php
/*
 * Copyright 2019 TestingForMe simon.proud@ro.ru
 * Класс предназначен для вычисления разницы между двумя числами. Поставляется "как есть", и автор
 * снимает с себя всю ответственность за использование этого кода. 
 */

class CostDiff
{
    public $diff;
    public $actual;
    public $last;
    private $res;
    private $amount;
    
    /**
      * @param int $diff - разница в процентах между $actual и $last
      * @param int $actual - актуальная (новая цена)
      * @param int $last - предыдущая (старая цена) по умолчанию равна 1
      * @param int $res - подстановочное число.
    **/
    public function __construct($diff, $actual, $last = 1, $res = 0){
        $this->diff = $diff;
        $this->actual = $actual;
        
        $this->last = (isset($last) && $last != null)?$last: 1;
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
      * Геттер результата
      * @return float - возвращает результат вычислений.
    **/
    public function getAmount (){return $this->amount;}
    
}

?>
