<?php
$user = new User();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo ($this->title ? $this->title . ' - ' : null) . app::getInstance()->config['sitename']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="app/views/layouts/css/theme.css" rel="stylesheet">
    <link href="app/views/layouts/css/creative.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top">
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top affix">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Суперблог!</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if (!$user->isLogged()) : ?>
                <form class="navbar-form navbar-right" id="login-form">
                    <div class="form-group">
                        <input type="text" name="login" placeholder="Login" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Вход
                    </button>
                </form>
            <?php else : ?>
                <div class="navbar-form navbar-right">
                    <a href="index.php?controller=user&action=logout" class="btn btn-success pull-right">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Выход
                    </a>
                </div>
            <?php endif; ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="page-scroll" href="index.php">Главная</a></li>
                <li><a class="page-scroll" href="index.php?controller=index&action=about">Об авторе</a></li>
                <li><a class="page-scroll" href="index.php?controller=index&action=contact">Контакты</a></li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php if ($this->isMainPage()) : ?>
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Я нашел отличный шаблон для блога</h1>
                <hr>
                <p>Уже устал от кода, пошел смотреть красивые картинки</p>
                <a href="#blog-posts" class="btn btn-primary btn-xl page-scroll">И что дальше?</a>
            </div>
        </div>
    </header>
<?php endif; ?>

<div class="container" id="blog-posts">

    <? include dirname(__FILE__) . '/layouts/' . $this->layout . '.php'; ?>
</div><!-- /.container -->

<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <hr class="primary">
                <p>Powered by Вовка 2016</p>
            </div>
</section>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="app/views/layouts/js/app.js"></script>
</body>
</html>