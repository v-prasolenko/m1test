<?php
/**
 * @var Post $model
 */
?>
<h1><?php echo $model->title;?></h1>
    <small><?php echo $model->getCreatedDate();?></small>
<div class="post-content">
<?php if ($model->img) : ?>
    <img src="/app/images/<?php echo $model->img?>" class="post-image">
<?php endif;?>
    <?php echo $model->content;?>
</div>

<?php if ($user->isLogged()) : ?>
    <div class="row">
    <a class="btn btn-danger btn-sm" href="index.php?controller=post&action=delete&id=<?php echo $model->id; ?>">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Удалить
    </a>

    <a class="btn btn-info btn-sm" href="index.php?controller=post&action=edit&id=<?php echo $model->id; ?>">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Редактировать
    </a>
    </div>
<?php endif;?>
<div id="disqus_thread"></div>
<script>
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '//lordglue.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>