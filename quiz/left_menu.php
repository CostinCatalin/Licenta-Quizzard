<div class="uk-width-1-5 uk-height-expand">
	<div class="uk-card uk-card-default uk-card-body uk-text-left">
	    	<div class="uk-child-width-1-1 uk-grid-medium" uk-grid>
	    		<div>
	    			<h5 class="uk-text-bolder uk-text-uppercase uk-text-muted font-monospace">Conținut</h5>
	    			<ul class="uk-list uk-link-text uk-text-primary">
	    				<li><a href="http://quizzard.epizy.com/new/?id=<?echo $quiz_id;?>">Modifică detaliile</a></li>
	    				<li>
		    				<form name="uploader" enctype="multipart/form-data">
								<div class="js-upload">
									<div uk-form-custom>
								    	<input id="fileSelect" class="file-upload__input" type="file" name="photo" onchange="uploadPhoto();" />
								    	<input name="quiz-id" type="hidden" value="<?echo $row['quiz_id'];?>">
								    	<a class="uk-link cursor-pointer">Adaugă o imagine la descriere</a>
								    </div>
								</div>
						  	</form>
					  	</li>
					    <li><a href="http://quizzard.epizy.com/new/?id=<?echo $quiz_id;?>#questions-content-panel">Editează întrebările</a></li>
					    <li><a href="http://quizzard.epizy.com/solve/?id=<?echo $quiz_id;?>">Previzualizează</a></li>
					</ul>
					<hr>

	    		</div>
	    		<div>
	    			<h5 class="uk-text-bolder uk-text-uppercase uk-text-muted font-monospace">Calendar</h5>
	    			<div>
	    				<label class="datepicker-box" for="datepicker"> Data creării
	    				<input type="text" id="quiz_creation_date" value="<?echo date('d-m-Y', $row['quiz_creation_date']);?>" class="datepicker uk-margin-small-top" disabled autocomplete="on"></label>
	    			</div>
					<div class="uk-margin-small-top">
						<label class="datepicker-box" for="datepicker"> Disponibil din
						<input type="text" onchange="setStartDate('<?echo $quiz_id;?>', this.value)" id="quiz_begin_date" value="<?echo date('d-m-Y', $row['quiz_start_date']);?>" class="datepicker uk-margin-small-top" autocomplete="off"></label>
					</div>	
					<div class="uk-margin-small-top">
						<label class="datepicker-box" for="datepicker"> Se termină în
						<input type="text" onchange="setEndDate('<?echo $quiz_id;?>', this.value)" id="quiz_end_date" value="<?echo date('d-m-Y', $row['quiz_end_date']);?>" class="datepicker uk-margin-small-top" autocomplete="off"></label>
					</div>
					<hr>

	    		</div>
	    		
	    		<div>
	    			<h5 class="uk-text-bolder uk-text-uppercase uk-text-muted font-monospace">Status</h5>
	    			<div class="uk-margin">
				        <div class="uk-form-controls uk-form-controls-text">
				        	<label><input class="uk-radio" type="radio" name="radiostatus" <?if($row['quiz_status'] == 1) echo "checked";?> disabled> Schiță</label><br>
				            <label><input class="uk-radio" type="radio" name="radiostatus" <?if($row['quiz_status'] == 2) echo "checked";?> disabled> Publicat</label><br>
				            <label><input class="uk-radio" type="radio" name="radiostatus" <?if($row['quiz_status'] == 3) echo "checked";?> disabled> Încheiat</label><br>
				            <label><input class="uk-radio" type="radio" name="radiostatus"  <?if($row['quiz_status'] == 5) echo "checked";?> disabled> Blocat</label><br>
				        </div>
				    </div>
	    			<hr>
	    		</div>
	    		<div>
	    			<h5 class="uk-text-bolder uk-text-uppercase uk-text-muted font-monospace">Opțional</h5>
	    			<ul class="uk-list uk-link-text uk-text-primary">
	    				<li><a onclick="editQuizStatus('<?echo $quiz_id;?>', 1)" href="#">Setează ca schiță</a></li>
	    				<li><a onclick="editQuizStatus('<?echo $quiz_id;?>', 2)">Publică quiz-ul</a></li>
	    				<li><a onclick="editQuizStatus('<?echo $quiz_id;?>', 3)" href="#">Încheie quiz-ul</a></li>
	    			</ul>
	    		</div>
	    	</div>  
	</div>
</div>