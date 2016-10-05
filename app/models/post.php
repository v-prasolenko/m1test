<?php

/**
 * Class Post
 */
class Post extends ModelTable
{
    /**
     * @var string
     */
    static public $table = 'posts';
    /**
     * @var array
     */
    public $safe = ['id', 'title', 'content', 'created', 'modified', 'img'];

    /**
     * @return mixed
     */
    public function beforeSave()
    {
        $this->modified = date('Y-m-d H:i:s');
        $this->created = $this->created ? $this->created :  date('Y-m-d H:i:s');
        return parent::beforeSave();
    }

    public function getCreatedDate()
    {
        return date('d.m.Y', strtotime($this->created));
    }
}