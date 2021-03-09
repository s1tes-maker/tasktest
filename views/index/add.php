<div class="col-12">

    <?php if($success === true) :?>
        <div class="row justify-content-center">
            <div class="alert alert-success mt-5 w-75 text-center">
                <h5>Задача успешно добавлена!</h5>
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
		            Добавление новой задачи
		        </h5>
			    <div class="card-body">
			  		<div class="form-group">
			    		<label for="inputUserName">Имя пользователя</label>
			    		<input type="text" name="user_name" class="form-control" id="inputUserName" aria-describedby="emailHelp" placeholder="Ваше имя" required>
			  		    <?php if(isset($errors['user_name'][0])) : ?>
                            <small class="form-text text-danger font-weight-bold"><?=$errors['user_name'][0]?></small>
                        <?php endif ?>

                    </div>
			  		<div class="form-group">
			    		<label for="InputEmail">E-mail</label>
			    		<input type="email" name="user_email" class="form-control" id="InputEmail" placeholder="Ваш e-mail" required>
                        <?php if(isset($errors['user_email'][0])) : ?>
                            <small class="form-text text-danger font-weight-bold"><?=$errors['user_email'][0]?></small>
                        <?php endif ?>
			  		</div>
			  		<div class="form-group">
						<label for="textareaTaskKontent">Текст задачи</label>
						<textarea class="form-control" id="textareaTaskKontent" rows="10" name="content" required></textarea>
                        <?php if(isset($errors['content'][0])) : ?>
                            <small class="form-text text-danger font-weight-bold"><?=$errors['content'][0]?></small>
                        <?php endif ?>
                    </div>
			  		<button type="submit" class="btn btn-primary">Добавить</button>
			  	</div>
			</div>
		</div>	
	</form>
</div>