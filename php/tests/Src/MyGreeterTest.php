<?php

use PHPUnit\Framework\TestCase;
use Src\MyGreeter;

class MyGreeterTest extends TestCase
{
    private Src\MyGreeter $greeter;

    public function setUp(): void
    {
        $this->greeter = new Src\MyGreeter();
    }

    public function test_init()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    // public function test_greeting()
    // {
    //     $this->assertTrue(
    //         strlen($this->greeter->greeting()) > 0
    //     );
    // }

    public function test_greeting()
    {
        // 通过移动时区来模拟各个时间段
        for($i=0;$i<=12;$i++){
            $this->test_single_greeting("+".$i); 
        }
        for($i=0;$i<=12;$i++){
            $this->test_single_greeting("-".$i); 
        }
        
    }

    private function test_single_greeting($timezoneOffset)
    {
        //设置时区
        date_default_timezone_set("Etc/GMT".$timezoneOffset);
        //获取小时
        $hour = date("H");
        //默认是晚上好
        $result =  "Good evening";
        
        if ($hour >= 6 && $hour < 12) {
            //如果是6AM至12AM之间时，返回 "Good morning"。
            $result =  "Good morning";
        } elseif ($hour >= 12 && $hour < 18) {
            //如果是12AM至6PM之间时，返回 "Good afternoon"。
            $result =  "Good afternoon";
        } 
        $this->assertEquals($this->greeter->greeting(), $result);
    }


}
 