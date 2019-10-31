<?php


namespace gionnicammello\Sanitizer;


/**
 * A class that provide sanitize helpers inline;
 * Class Sanitizer
 * @package gionnicammello\Sanitizer
 */
class Sanitizer
{
    protected $value;


    /**
     * Sanitizer constructor.
     * Need the value to be processed.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value=$value;
    }


    /**
     * helper inline of filter_var
     * @param $sanitizeFilter
     * @param null $options
     * @return $this|bool
     * @throws InvalidFilterException
     */
    public function filter($sanitizeFilter,$options=null)
    {
        $var=filter_var($this->value,$sanitizeFilter,$options);

        if(is_bool($var)){
            throw new InvalidFilterException('Can use only sanitize filters');
            return false;
        }
        $this->value=$var;
        return $this;

    }

    /**
     * remove white spaces at the beginning and at the end of a value
     * @return $this
     */
    public function trim()
    {
        $this->value=trim($this->value);
        return $this;
    }


    /**
     * Set a default value if noll or "" is passed
     * @param $value
     * @return $this
     */
    public function setDefault($value)
    {
        if($this->value === null || $this->value == '')
        {
            $this->value=$value;
        }
        return $this;
    }


    /**
     * return the value after process
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }
}