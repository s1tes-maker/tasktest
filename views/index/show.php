<div class="row">
    <div class="col-12 text-center">
        <h1>Список задач</h1>
    </div>
</div>

<div class="row">
    <?php $i = 0 ?>
    <?php foreach($tasks as $task) :?>
        <div class="col-lg my-3">
            <div class="card text-dark bg-light">
                <h5 class="card-header">
                    Задача № <?= ++$i ?>
                </h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $task['user_name'] ?></li>
                    <li class="list-group-item"><?= $task['user_email'] ?></li>
                    <li class="list-group-item"><?= $task['status'] ?></li>
                    <li class="list-group-item"><?= $task['content'] ?></li>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>

