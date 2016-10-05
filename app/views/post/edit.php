<?php
/**
 * @var Post $model
 */
$this->title = $model->id ? 'Редактирование поста' : 'Создание поста';
$url = $model->id ? "edit&id=" . $model->id : "create";
?>
<h1><?php echo $this->title; ?></h1>
<form action="index.php?controller=post&action=<?php echo $url; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" class="form-control" name="title" placeholder="Название"
               value="<?php echo $model->title; ?>">
    </div>
    <div class="form-group">
        <label for="img">Фото</label>
        <input type="file" class="form-control" id="img" name="img" placeholder="Фото">
        <p class="help-block">Только одно фото для поста</p>
    </div>
    <div class="form-group">


           <textarea class="form-control" name="content" rows="6" id="editor">
               <?php echo $model->content; ?>
           </textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $model->id; ?>">
    <button type="submit" class="btn btn-success">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        Отправить
    </button>
</form>

<link rel="stylesheet" href="app/views/layouts/editor/jquery.cleditor.css"/>
<script src="app/views/layouts/editor/jquery.cleditor.min.js"></script>
<script>
    $(document).ready(function () {
        $("#editor").cleditor();
    });
</script>