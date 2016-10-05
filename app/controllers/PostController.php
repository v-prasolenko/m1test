<?php

/**
 * Class PostController
 */
class PostController extends Controller
{
    /**
     *
     */
    public function actionIndex()
    {
        $model = new Post();
        $this->render('index', [
            'models' => $model->findAll(),
            'user' => new User(),
        ]);
    }

    /**
     * @param $id
     */
    public function actionRead($id)
    {
        $model = new Post();
        $this->render('read', [
            'model' => $model->findOne($id),
            'user' => new User(),
        ]);
    }

    /**
     * @param $id
     */
    public function actionDelete($id)
    {
        $model = new Post();
        $m = $model->delete($id);
        $this->redirect('/');
    }

    /**
     * @param $id
     */
    public function actionEdit($id)
    {
        $user = new User();
        if (!$user->isLogged()) {
            $this->redirect('/');
        }
        $model = new Post();
        $model = $model->findOne($id);
        if (isset($_POST['content'])) {
            $this->saveModel($model);
        }

        $this->render('edit', ['model' => $model]);
    }

    /**
     *
     */
    public function actionCreate()
    {
        $user = new User();
        if (!$user->isLogged()) {
            $this->redirect('/');
        }
        $model = new Post();

        if (isset($_POST['content'])) {
            $this->saveModel($model);
        }

        $this->render('edit', ['model' => $model]);
    }

    /**
     * @param Post $model
     */
    private function saveModel(Post $model)
    {
        $model->title = $this->santinize($_POST['title'] ? $_POST['title'] : null);
        $model->content = $_POST['content'] ? $_POST['content'] : null;
        if (isset($_FILES["img"]) && $_FILES["img"]["name"]) {
            $filename = time() . basename($_FILES["img"]["name"]);
            $target_file = IMG_DIR . $filename;
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $check = false;
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $check = false;
            }
            if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                echo "Sorry, there was an error uploading your file.";
                $check = false;
            }

            if ($check == false) {
                $this->redirect('index.php?controller=post&action=edit&id=' . $model->id);
                return;
            }
            $model->img = $filename;
        }
        $model->save();
        $this->redirect('index.php?controller=post&action=read&id=' . $model->id);
        return;
    }
}