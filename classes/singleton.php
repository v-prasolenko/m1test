<?php

/**
 * Class Singleton
 */
abstract class Singleton
{
    /**
     * @var array
     */
    private static $_instances = [];

    /**
     * @param bool $className
     * @return mixed
     * @throws Exception
     */
    public static function getInstance($className = false)
    {
        $sClassName = ($className === false) ? get_called_class() : $className;

        if (class_exists($sClassName)) {
            if (!isset(self::$_instances[$sClassName])) {
                self::$_instances[$sClassName] = new $sClassName();
            }
            $instance = self::$_instances[$sClassName];
            return $instance;
        } else {
            throw new Exception('Class ' . $sClassName . '  not exist!');
        }
    }

    /**
     *
     */
    final private function __clone()
    {
    }

    /**
     * Singleton constructor.
     */
    private function __construct()
    {
    }
}
