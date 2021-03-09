<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          	<li class="nav-item active">
            	<a class="nav-link" href="/">Список задач<span class="sr-only">(current)</span></a>
          	</li>
          	<li class="nav-item">
                <?php if(!isset($_SESSION['user'])) : ?>
            	    <a class="nav-link" href="/admin/user/login">Войти в админ</a>
                <?php else : ?>
                    <a class="nav-link" href="/admin/user/logout">Выход</a>
                <?php endif; ?>
          	</li>
        </ul>
    </div>
</nav>
