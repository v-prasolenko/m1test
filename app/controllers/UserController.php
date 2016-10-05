<?php

/**
 * Class UserController
 */
class UserController extends Controller
{
    /**
     *
     */
    public function actionIndex()
    {
        $model = new User();
        $this->render('index', ['model' => $model]);
    }

    /**
     *
     */
    public function actionLogin()
    {
        $response = [];
        $model = new User();
        $name = isset($_POST['login']) ? $_POST['login'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        if ($model->checkPassword($password)) {
            $model->login();
            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['error'] = "Не найден пользователь или неверный пароль";
        }

        echo json_encode($response);
    }

    /**
     *
     */
    public function actionLogout()
    {
        $model = new User();
        $model->logout();
        $this->redirect('/');
    }
}