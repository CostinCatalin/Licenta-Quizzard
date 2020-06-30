function adaugare_slide(){ //incarcarea imaginii + link 
	parent = $('#slide_parent').text();
	$("form[name='uploader']").submit(function(e) {
		var regex_url = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
        var formData = new FormData($(this)[0]);
        link_p = $('#link').val();
        alt_p = $('#alt').val();
        parent_p = $('#slide_parent').text();

        if(link_p.search(regex_url)==-1){ //verificare link
           	alert("Url invalid");
           	return 0;
        }
        formData.append('link', link_p);
        formData.append('alt', alt_p);
        formData.append('parent', parent_p);
        
        
        $.ajax({
            url: "adaugare.php",
            type: "POST",
            data: formData,
            async: false,
            success: function (data) {
            	alert(data);
            	window.location.reload();
            },
            cache: false,
            contentType: false,
            processData: false
        });
        e.preventDefault();
    });
}

<form name="uploader" enctype="multipart/form-data" class="form-horizontal" style="margin-left:10px;">
       					<label for="fileSelect" style="width: 500px;" class="file-upload__label  btn btn-success"><i class="fa fa-upload"> </i> Selecteaza imaginea</label>
        				<input id="fileSelect" class="file-upload__input" type="file" name="photo" />
        				<div class="form-group" style="float:left;margin-right:5px"><label class="col-sm-2 control-label">Link: </label>
        					<div class="col-sm-10"><input type="text" name="link" id="link" class="form-control" ></div>
       					</div>
        				<div class="form-group" style="float:left; width: 186px;"><label class="col-sm-2 control-label">Alt: </label>
        					<div class="col-sm-10"><input type="text" name="alt" id="alt" class="form-control" ></div>
       					</div>
        			<input class="btn btn-success" type="submit" name="submit" value="Upload" onclick="adaugare_slide()">
  					</form>