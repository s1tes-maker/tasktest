<div class="col-12">

    <?php if($success === true) :?>
        <div class="row justify-content-center">
            <div class="alert alert-success mt-5 w-75 text-center">
                <h5>Задача успешно отредактирована!</h5>
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
                    Редактирование задачи
                </h5>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputUserName">Имя пользователя</label>
                        <p><?= $task['user_name'] ?></p>

                    </div>
                    <div class="form-group">
                        <label for="InputEmail">E-mail</label>
                        <p><?= $task['user_email'] ?></p>
                    </div>
                    <div class="form-group">
                        <label for="textareaTaskKontent">Текст задачи</label>
                        <textarea class="form-control" id="textareaTaskKontent" rows="10" name="content" ><?= $task['content'] ?></textarea>
                        <?php if(isset($errors['content'][0])) : ?>
                            <small class="form-text text-danger font-weight-bold"><?=$errors['content'][0]?></small>
                        <?php endif ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </div>
            </div>
        </div>
    </form>
</div>
