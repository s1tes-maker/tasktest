<form method="post" action="?page=1">
	<div class="row border my-3 p-3 bg-white">
	
	    <h5 class="text-left mb-2 col-12">сортировка задач:</h5>
	    <div class="col-6-auto mr-3 mb-2">
		    <select class="form-control form-select-sm" name="sort_field" required>
		        <option selected disabled value="">Выберите поле для сортировки</option>
		        <option value="user_name" 
		        	<?php if($old_post_params['sort_field'] == 'user_name'): ?>
		        		selected
		        	<?php endif; ?> > имя пользователя </option>
		        
		        <option value="user_email" 
		        	<?php if($old_post_params['sort_field'] == 'user_email'): ?>
		        		selected
		        	<?php endif; ?> >e-mail</option>

		        <option value="status" 
		        	<?php if($old_post_params['sort_field'] == 'status'): ?>
		        		selected
		        	<?php endif; ?> >статус</option>
		    </select>
		</div>

		<div class="col-6-auto mr-3 mb-2">    
		    <div class="row mt-2 justify-content-start pl-3">
		    	<div class="form-check col-auto">
		  			<input class="form-check-input" type="radio" name="sort_direction" value="asc" 
		  				<?php if($old_post_params['sort_direction'] != 'desc'): ?>
		        			checked
		        		<?php endif; ?> >

		  			<label class="form-check-label" for="flexRadioDefault1">
		    			По возрастанию
		  			</label>
				</div>
				<div class="form-check col-auto">
		  			<input class="form-check-input" type="radio" name="sort_direction" value="desc"
		  				<?php if($old_post_params['sort_direction'] == 'desc'): ?>
		        			checked
		        		<?php endif; ?>>
		  			<label class="form-check-label" for="flexRadioDefault2">
		    			По убыванию
		  			</label>
				</div>  
			</div> 
		</div>
		<div class="row">
			<div class="col-sm-auto">
				<button type="submit" class="btn-sm btn-info">Применить</button>
			</div>
		</div>
	</div>
</form>
