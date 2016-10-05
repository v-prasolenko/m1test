<?php

/**
 * Базовый контроллер
 */
class Controller extends Singleton
{
    /**
     * @var string Лейаут страниц
     */
    public $layout = 'base';
    /**
     * @var string Название страницы
     */
    public $title = '';
    /**
     * @var string Путь до папки с вьюхами текущего конторллера
     */
    public $tplControllerPath;
    /**
     * @var string Путь до вьюх
     */
    public $tplPath;

    /**
     * Если есть метод - зовем. Нет - кричим "Ашипко!!!"
     *
     * @param $methodName
     * @param array $args
     * @return mixed
     * @throws Exception
     */
    function __call($methodName, $args = [])
    {
        if (method_exists($this, $methodName)) {
            return call_user_func_array([$this, $methodName], $args);
        } else {
            throw new Exception('In controller ' . get_called_class() . ' method ' . $methodName . ' not found!');
        }
    }


    /**
     * Перенаправление
     *
     * @param $string
     */
    public function redirect($string)
    {
        header('Location: '.$string);
    }

    /**
     * Пропишем пути
     */
    function __construct()
    {
        $this->tplPath = APP . 'views/';
        $this->tplControllerPath = APP . 'views/' . strtolower(str_replace('Controller', '', get_called_class())) . '/';
    }

    /**
     * Частичная отрисовка вьюхи. Потом пихнем в лейаут
     *
     * @param $fullpath
     * @param array $variables
     * @param bool $output
     * @return bool|string
     * @throws Exception
     */
    private function _renderPartial($fullpath, $variables = [], $output = true)
    {
        extract($variables);

        if (file_exists($fullpath)) {
            if (!$output) {
                ob_start();
            }
            include $fullpath;
            return !$output ? ob_get_clean() : true;
        } else {
            throw new Exception('File ' . $fullpath . ' not found');
        }

    }

    /**
     * @param $filename
     * @param array $variables
     * @param bool $output
     * @return bool|string
     * @throws Exception
     */
    public function renderPartial($filename, $variables = [], $output = true)
    {
        $file = $this->tplControllerPath . str_replace('..', '', $filename) . '.php';

        return $this->_renderPartial($file, $variables, $output);
    }

    /**
     * Полная отрисовка страницы
     * @param $filename
     * @param array $variables
     * @param bool $output
     * @throws Exception
     */
    public function render($filename, $variables = [], $output = false)
    {
        $content = $this->renderPartial($filename, $variables, $output);
        $html = $this->_renderPartial($this->tplPath . 'main.php', ['content' => $content], false);
        echo $html;
    }

    /**
     * Жалкая попытка почистить строки от инъекций
     *
     * @param $input
     * @return mixed
     */
    public function santinize($input)
    {
        return htmlspecialchars($input);
    }

    /**
     * Проверка на главную страницу...
     * @return bool
     */
    public function isMainPage()
    {
        return count($_GET) == 1;
    }
}
