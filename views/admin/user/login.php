<div class="col-12">
    <?php if($success === true) :?>
        <div class="row justify-content-center">
            <div class="alert alert-success mt-5 w-75 text-center">
                <h5>Вы вошли в админ</h5>
                <a href="/">
                    <button type="button" class="btn btn-info">
                        Список задач
                    </button></a>
            </div>
        </div>
        <?php return; endif; ?>

    <form method="post" action="#">
        <div class="row justify-content-center">
            <div class="card text-dark bg-light mt-5 w-75">
                <h5 class="card-header text-center">
                    Вход в панель администратора
                </h5>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputUserName">Логин</label>
                        <input type="text" name="login" class="form-control" id="inputUserName" aria-describedby="emailHelp" placeholder="Логин" required>
                        <small class="form-text">логин admin</small>
                        <?php if(isset($errors['login'][0])) : ?>
                            <small class="form-text text-danger font-weight-bold"><?=$errors['login'][0]?></small>
                        <?php endif ?>

                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Пароль</label>
                        <input type="password" name="password" class="form-control" id="InputEmail" placeholder="Пароль" required>
                        <small class="form-text">пароль 123</small>
                        <?php if(isset($errors['password'][0])) : ?>
                            <small class="form-text text-danger font-weight-bold"><?=$errors['password'][0]?></small>
                        <?php endif ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Войти</button>
                </div>
            </div>
        </div>
    </form>
</div>