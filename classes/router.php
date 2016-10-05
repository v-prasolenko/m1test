<?php

/**
 * Class Router
 */
class Router extends Singleton
{
    /**
     * @var string
     */
    public $action = 'index';
    /**
     * @var bool
     */
    public $controller = false;

    /**
     * @throws Exception
     */
    function parse()
    {
        $this->controller = app::getInstance()->config['default_controller'];
        $this->action = app::getInstance()->config['default_action'];

        if (isset($_REQUEST['controller'])) {
            $this->controller = $_REQUEST['controller'];
        }
        if (isset($_REQUEST['action'])) {
            $this->action = $_REQUEST['action'];
        }
    }
}