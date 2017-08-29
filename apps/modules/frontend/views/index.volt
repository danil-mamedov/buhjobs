<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/core.css">
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.5/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
        <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.5/css/froala_style.min.css' rel='stylesheet' type='text/css' />
        <title>Анонімний пошук роботи для бухгалтерів</title>
    </head>
    <body>
        <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">LOGO</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="#">Главная</a></li>
                <li><a href="#about">Вакансии</a></li>
                <li><a href="#contact">Резюме</a></li>

                    <li><a href="/login">Вход</a></li>
                    <li><a href="/registration">Регистрация</a></li>
                    <li><a href="/logout">Выйти из аккаунта</a></li>
              </ul>
            </div><!-- /.nav-collapse -->
          </div><!-- /.container -->
        </div>
        <div class='container'>
            <div class="col-md-2">
                <ul>
                    <li><a href='/my/profile/'>Мои профиль</a></li>
                    <li><a href="/offers">Мои предложения</a></li>
                    <li><a href="/my/messages">Мои сообщения</a></li>
                    <li><a href="/my/vacancies">Мои вакансии</a></li>
                </ul> 
            </div>
            <div class='col-md-10'>
                {{ content() }}
            </div>
        </div>
    </body>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/core.js"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.5/js/froala_editor.min.js'></script>
    <script>

    </script>
</html>