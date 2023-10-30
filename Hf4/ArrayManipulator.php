<?php

namespace Hf4;

class ArrayManipulator {
    private array $data = [];


    public function __get($key){
        if(isset($this->data[$key])){
            return $this->data[$key];
        }
        else{
            return null;
        }
    }

    public function __set($key, $value){
        $this->data[$key] = $value;
    }

    public function __isset($key){
        return isset($this->data[$key]);
    }

    public function __unset($key){
        if(isset($this->data[$key])){
            unset($this->data[$key]);
        }
    }

    public function __toString(){
        return implode(',', $this->data);
    }

    public function __clone()
    {
        return new ArrayManipulator($this->data);
    }


}


$obj = new ArrayManipulator();
$obj->apple = 'apple';
$obj->banana = 'banana';
$obj->cherry = 'cherry';


echo $obj->apple . '<br>';
$obj->orange = 'orange';
echo $obj->orange . '<br>';

echo (isset($obj->banana)) . '<br>';
unset($obj->banana);
echo (isset($obj->banana)) . '<br>';
unset($obj->cherry);
echo $obj . '<br>';

$objClone = clone $obj;
$objClone->apple = 'green apple';

echo $obj->apple . '<br>';
echo $objClone->apple . '<br>';