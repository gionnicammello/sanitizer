<?php

use PHPUnit\Framework\TestCase;
use gionnicammello\Sanitizer\Sanitizer;



class testSanitizer extends TestCase
{

    public function testSanitizeIsSanitizeClass()
    {
        $this->assertInstanceOf(Sanitizer::class,new Sanitizer('value'));
    }




    public function testSanitizeCanReturnValue()
    {
        $value='value';
        $newValue=(new Sanitizer($value))->value();
        $this->assertEquals($value,$newValue);
    }




    public function testSanitizeCanTrimString()
    {
        $value=' value    ';
        $newValue=(new Sanitizer($value))->trim()->value();
        $this->assertEquals('value',$newValue);
    }




    public function testSanitizeCanSetADefaultValueIfNotSetted()
    {
        $value=null;
        $newValueNull=(new Sanitizer($value))->setDefault('fromnull')->value();
        $value='';
        $newValueAmp=(new Sanitizer($value))->setDefault('fromamp')->value();
        $value='notnull';
        $newValueValued=(new Sanitizer($value))->setDefault('fromvalue')->value();

        $this->assertEquals($newValueNull,'fromnull');
        $this->assertEquals($newValueAmp,'fromamp');
        $this->assertEquals($newValueValued,'notnull');
    }

}