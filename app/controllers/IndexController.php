<?php

/**
 * Class IndexController
 */
class IndexController extends Controller
{
    /**
     *
     */
    public function actionIndex()
    {
        $post = new Post();
        $this->render('index', [
            'posts' => $post->findAll(),
            'user' => new User(),
        ]);
    }

    /**
     *
     */
    public function actionContact()
    {
        $this->render('contact');
    }

    /**
     *
     */
    public function actionAbout()
    {
        $this->render('about');
    }
}