<?php
/**
 * @var Post[] $posts
 */
?>
<h1>Все записи блога</h1>
<?php if ($user->isLogged()) : ?>
<a class="btn btn-danger pull-right" href="index.php?controller=post&action=create">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Создать пост
</a>
<?php endif;?>
<div class="blog-header">

    <?php foreach ($posts as $post) : ?>
        <div class="post">
            <h3><a href="index.php?controller=post&action=read&id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a>
                <small><?php echo $post->getCreatedDate(); ?></small>
            </h3>
            <div class="post-content"><?php echo mb_substr($post->content, 0, 255) . '...'; ?></div>
            <div class="post-readmore pull-right">
        <?php if ($user->isLogged()) : ?>
            <a class="btn btn-danger btn-sm" href="index.php?controller=post&action=delete&id=<?php echo $post->id; ?>">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Удалить
            </a>

            <a class="btn btn-info btn-sm" href="index.php?controller=post&action=edit&id=<?php echo $post->id; ?>">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Редактировать
            </a>
            <?php endif;?>
                <a class="btn btn-primary btn-sm" href="index.php?controller=post&action=read&id=<?php echo $post->id; ?>">
                    Читать далее
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>