<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="http://wow.zamimg.com/images/wow/icons/medium/inv_scroll_03.jpg" alt=""></a>
            <!--a class="navbar-brand" href="#">Рецепты Запределья</a-->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Все Рецепты</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Мои Рецепты <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::getCurrentRoute()->uri == 'admin/receipts' ? 'active' : ''}}"><a href="/admin/receipts">Все</a></li>
                        <li class="{{ Route::getCurrentRoute()->uri == 'admin/receipts/create' ? 'active' : ''}}"><a href="/admin/receipts/create">Добавить Рецепт</a></li>
                        <li class="divider"></li>
                        <li class="{{ Route::getCurrentRoute()->uri == 'admin/ingredients' ? 'active' : ''}}"><a href="/admin/ingredients">Ингредиенты</a></li>
                        <li class="{{ Route::getCurrentRoute()->uri == 'admin/ingredients/create' ? 'active' : ''}}"><a href="/admin/ingredients/create">Добавить Ингредиент</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Отправить</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Route::getCurrentRoute()->uri == 'admin/parsed-receipts' ? 'active' : ''}}"><a href="/admin/parsed-receipts">Новые рецепты</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Действие</a></li>
                        <li><a href="#">Другое действие</a></li>
                        <li><a href="#">Что-то еще</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Отдельная ссылка</a></li>
                    </ul>
                </li>
                <li><a href="/logout">Выйти</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>