<?php

/**
 * Class ModelTable
 */
abstract class ModelTable extends Model
{
    /**
     * @var array
     */
    public $errors = [];
    /**
     * @var string
     */
    static public $table = '{table}';
    /**
     * @var string
     */
    static public $primary = 'id';

    /**
     * @return bool
     */
    function beforeSave()
    {
        return !count($this->errors);
    }

    /**
     * @return mixed
     */
    function save()
    {
        $modelname = get_called_class();
        if ($this->beforeSave()) {
            if (!$this->__get(self::$primary)) {
                $res = App::getInstance()->db->insert($modelname::$table, $this->_data);
                $this->__set($modelname::$primary, App::getInstance()->db->id());
                return $res;
            } else {
                return App::getInstance()->db->update($modelname::$table, $this->_data,
                    $modelname::$primary . '=' . $this->__get(self::$primary));
            }
        }

        return null;
    }

    /**
     * Все записи
     *
     * @return array
     */
    static function findAll()
    {
        $modelname = get_called_class();
        $items = App::getInstance()->db->query('SELECT * FROM ' . $modelname::$table)->result();
        $results = [];
        foreach ($items as $item) {
            $model = new $modelname();
            $model->__attributes = $item;
            $results[] = $model;
        }

        return $results;
    }

    /**
     * Одна запись
     *
     * @param $id
     * @return mixed
     */
    static function findOne($id)
    {
        $modelname = get_called_class();
        $item = App::getInstance()->db->select($modelname::$table, [$modelname::$primary => $id])->result();
        if (count($item)) {
            $model = new $modelname();
            $model->__attributes = $item[0];
            return $model;
        } else {
            return null;
        }
    }

    /**
     * Удаление
     *
     * @param $id
     * @return mixed
     */
    static function delete($id)
    {
        $modelname = get_called_class();
        $item = App::getInstance()->db->delete($modelname::$table, [$modelname::$primary => $id]);

        return (bool)$item;
    }
}