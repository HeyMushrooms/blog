<?php

/**
 * Created by PhpStorm.
 * User: 10719
 * Date: 2019/3/8
 * Time: 16:25
 */
namespace Home\Controller;

class testController
{
    private $time;
    private $memory;
    public function begin()
    {
        $this->time = $this->getTime();
        $this->memory = $this->getMemory();
    }

    public function end()
    {
        $this->time = $this->getTime() - $this->time;
        $this->time = round($this->time, 7);//在这里才能格式化时间
        $this->memory = $this->getMemory() - $this->memory;
        $this->memory = $this->convert($this->memory);
        echo "time:{$this->time}秒<br />";
        echo "memory:{$this->memory}<br />";
    }


    public function getTime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    public function getMemory()
    {
        return memory_get_usage();
    }


    public function convert($size)
    {
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }
    public function test(){
        $a = array();
        $this->begin();
        for($i=0;$i<500000;$i++){
            $a[$i] = $i;
        }
        foreach($a as $i)
        {
            array_key_exists($i, $a);
        }
        $this->end();
    }

}