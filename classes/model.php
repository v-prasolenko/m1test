<?php

/**
 * Class Model
 */
abstract class Model
{
    /**
     * @var null|stdClass
     */
    protected $_data = null;
    /**
     * @var array
     */
    public $safe = [];

    /**
     * Model constructor.
     */
    function __construct()
    {
        $this->_data = new stdClass();
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|void
     */
    function __set($name, $value)
    {
        if ($name === '__attributes') {
            foreach ($value as $key => $val) {
                $this->__set($key, $val);
            }
            return;
        }
        if (method_exists($this, 'set' . $name)) {
            return call_user_func([$this, 'set' . $name], $value);
        }

        if (in_array($name, $this->safe)) {
            $this->_data->$name = $value;
        }
        return;
    }

    /**
     * @param $name
     * @return mixed|null|stdClass
     */
    function __get($name)
    {
        if ($name === '__attributes') {
            return $this->_data;
        }
        if (method_exists($this, 'get' . $name)) {
            return call_user_func([$this, 'get' . $name]);
        }
        return property_exists($this->_data, $name) ? $this->_data->$name : null;
    }
}