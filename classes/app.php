<?php

/**
 * Class App
 * Основной класс приложения
 *
 */
class App extends Singleton
{
    /**
     * @var array
     */
    public $config = null;

    /**
     * @var Database
     */
    public $db = null;

    /**
     * Загрузим конфиг, подключим БД, посмотрим роутер и позвем нужный метод
     */
    function start()
    {
        session_start();
        $this->config = include APP . 'config.php';
        $this->db = new Database($this->config['db']['dbname'], $this->config['db']['user'],
            $this->config['db']['password'], $this->config['db']['host']);
        Router::getInstance()->parse();
        $id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : null;
        $controller = app::getInstance(Router::getInstance()->controller . 'Controller');
        $controller->__call('action' . Router::getInstance()->action, ['id' => $id]);
    }
}