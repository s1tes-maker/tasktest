<?php if(!isset($alertMessage['text']))  return;?>
<?php if($alertMessage['text'] == '')  return;?>
<div class="bg-light" id="top-alert-message"> 
	<div class="toast" aria-live="assertive" aria-atomic="true" data-autohide="false" id="myMessage">
		<div class="toast-header text-primary">
			<i class="fas fa-bullhorn mr-2"></i>
		    <strong class="mr-auto">Уведомление</strong>
		    <small>11 mins ago</small>
		    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
		        <span aria-hidden="true">&times;</span>
		    </button>
		</div>
		<div class="toast-body">
		    <div class="alert alert-primary .text-primary">Задача успешно добавлена!</div>
		</div>
	</div>
	
</div>