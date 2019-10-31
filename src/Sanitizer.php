<?php


namespace gionnicammello\Sanitizer;


class Sanitizer
{
    protected $value;




    public function __construct($value)
    {
        $this->value=$value;
    }




    public function trim()
    {
        $this->value=trim($this->value);
        return $this;
    }




    public function setDefault($value)
    {
        if($this->value === null || $this->value == '')
        {
            $this->value=$value;
        }
        return $this;
    }




    public function value()
    {
        return $this->value;
    }
}