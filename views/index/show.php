<div class="col-12">
    <div class="row">
        <div class="col-12">

            <div class="row border my-3 p-3 bg-light">
                <div class="col-12">
                    <?php if(!isAdmin()) : ?>
                        <a href="/add"><button type="button" class="btn btn-info">
                            + Добавить задачу
                        </button></a>
                    <?php endif; ?>
                <div class="col-12">
                    <?php include 'form_sort_tasks.php'?>
                </div>      
            </div>
        </div>
    </div>

    <div class="row">
        <?php $i = 0 ?>
        <?php foreach($tasks as $task) :?>
            <div class="col-lg my-3">
                <div class="card text-dark bg-light">
                    <h5 class="card-header">
                        Задача № <?=$task['id'] ?>
                    </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $task['user_name'] ?></li>
                        <li class="list-group-item"><?= $task['user_email'] ?></li>
                        <li class="list-group-item"><?= $task['status'] ?></li>
                        <?php if(isAdmin()) : ?>
                            <li class="list-group-item">
                                <a href="/edit?id=<?= $task['id'] ?>">
                                    <button type="button" class="btn btn-info">
                                        Редактировать
                                    </button>
                                </a>
                            </li>
                            <?php if($task['admin_modified']) : ?>
                                <li class="list-group-item"><?= $task['admin_modified'] ?></li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li class="list-group-item"><?= $task['content'] ?></li>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include 'pagination.php'?>
</div>

