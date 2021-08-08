<!DOCTYPE html>
<html>
<head>
<title>Test</title>
<script src="jquery/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<br />
<div class="container">
<h3 align="center">Ajax Crud</h3>
<br />
<div align="right">
    <button  type="button"  class="btn btn-xs btn-primary add_user_button">Add user</button>
</div>
<br />
<div class="table-responsive" id="image_table">
    
</div>
</div>
</body>
</html>

<div id="edit_user_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" id="edit_user_form">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit user Details</h4>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 pull-left">
                    <span id="error_update_div"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name"  class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email"  class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile"  class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Qualification </label> <br/>
                                <input type="checkbox"  name="qualification" value="High School"> High School
                                <input type="checkbox"  name="qualification" value="Intermediate"> Intermediate
                            
                        </div>
                        <!-- <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" name="multiple_files" id="multiple_files" multiple class="form-control" />
                            <span class="text-muted">Only .jpg, png, .gif file allowed</span>
                            
                        </div> -->
                        <div class="form-group">
                            <label>State</label>
                            <select name="state"  class="form-control" >
                                <option value="Utter Pradesh">Utter Pradesh</option>
                                <option value="Bihar">Bihar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select name="city" class="form-control" >
                                <option value="Lucknow">Lucknow</option>
                                <option value="Kanpur">Kanpur</option>
                                <option value="Patna">Patna</option>
                            </select>
                        </div>
                    </div>
                </div>

                </div>
                <div class="modal-footer">
                <input type="hidden" name="id" id="id" value="" />
                <input type="submit" name="submit" class="btn btn-primary btn-xs" value="upadte" />
                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="add_user_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" id="add_user_form">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 pull-left">
                    <span id="error_multiple_files"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name"  class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email"  class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile"  class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Qualification </label> <br/>
                                <input type="checkbox"  name="qualification" value="High School"> High School
                                <input type="checkbox"  name="qualification" value="Intermediate"> Intermediate
                            
                        </div>
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" name="multiple_files" id="multiple_files" multiple class="form-control" />
                            <span class="text-muted">Only .jpg, png, .gif file allowed</span>
                            
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <select name="state"  class="form-control" >
                                <option value="Utter Pradesh">Utter Pradesh</option>
                                <option value="Bihar">Bihar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select name="city" class="form-control" >
                                <option value="Lucknow">Lucknow</option>
                                <option value="Kanpur">Kanpur</option>
                                <option value="Patna">Patna</option>
                            </select>
                        </div>
                    </div>
                </div>

                </div>
                
                <div class="modal-footer">
                <button type="submit" class="btn btn-xs btn-primary">Add User</button>
                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
load_image_data();
function load_image_data()
{
    $.ajax({
        url:"fetch.php",
        method:"POST",
        success:function(data)
        {
            $('#image_table').html(data);
        }
    });
} 

$('.add_user_button').click(function(){
    $('#add_user_modal').modal('show');
});
$('#add_user_form').submit(function(e){

    e.preventDefault();
    var userformId = '#add_user_form';
    var error_images = '';
    var form_data = new FormData();
    var files = $('#multiple_files')[0].files;
    if(files.length > 1)
    {
    error_images += 'You can not select more than 1 files';
    }
    else if(files.length == 0){
        error_images += 'Please Select image';
    }
    else
    {
        for(var i=0; i<files.length; i++)
        {
            var name = document.getElementById("multiple_files").files[i].name;
            var ext = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
            {
            error_images += '<p>Invalid '+i+' File</p>';
            }
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
            var f = document.getElementById("multiple_files").files[i];
            var fsize = f.size||f.fileSize;
            if(fsize > 2000000)
            {
            error_images += '<p>' + i + ' File Size is very big</p>';
            }
            else
            {
            form_data.append("file[]", document.getElementById('multiple_files').files[i]);
            }
        }
    }
    
    var name = $(userformId+' [name=name]').val();
    form_data.append("name", name);
    if(name==''){
        $('#error_multiple_files').html("<span class='text-danger'>name required</span>");
        return false;
    }
    var email = $(userformId+' [name=email]').val();
    form_data.append("email", email);
    if(email==''){
        $('#error_multiple_files').html("<span class='text-danger'>email required</span>");
        return false;
    }
    var mobile = $(userformId+' [name=mobile]').val();
    form_data.append("mobile", mobile);
    if(mobile==''){
        $('#error_multiple_files').html("<span class='text-danger'>mobile required</span>");
        return false;
    }
    var gender = $(userformId+' [name=gender]').val();
    form_data.append("gender", gender);
    if(gender ==''){
        $('#error_multiple_files').html("<span class='text-danger'>gender required</span>");
        return false;
    }

    var qualification ='';
    if(parseInt($(userformId+' input[type=checkbox]:checked').length) < 1){
        $('#error_multiple_files').html("<span class='text-danger'>qualification required</span>");
        return false;
    }else{
        var array = [];
        $(userformId+' input[type=checkbox]:checked').each(function() {
            array.push($(this).val());
        });
        qualification = array.toString();
    }
    form_data.append("qualification", qualification);

    var state = $(userformId+' [name=state]').val();
    form_data.append("state", state);
    if(state==''){
        $('#error_multiple_files').html("<span class='text-danger'>state required</span>");
        return false;
    }
    var city = $(userformId+' [name=city]').val();
    form_data.append("city", city);
    if(city==''){
        $('#error_multiple_files').html("<span class='text-danger'>city required</span>");
        return false;
    }

    if(error_images == '' )
    {
        $.ajax({
            url:"upload.php",
            method:"POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
                $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
            },   
            success:function(data)
            {
                $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
                load_image_data();
                $('#add_user_modal').modal('hide');
            }
        });
    }
    else
    {
        $('#multiple_files').val('');
        $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
        return false;
    }


});

$(document).on('click', '.edit', function(){
    var id = $(this).attr("id");
    var editUserId = '#edit_user_form';
    $.ajax({
        url:"edit.php",
        method:"post",
        data:{id:id},
        dataType:"json",
        success:function(data)
        {
            $('#edit_user_modal').modal('show');
            $(editUserId+' [name=name]').val(data.name);
            $(editUserId+' [name=email]').val(data.email);
            $(editUserId+' [name=mobile]').val(data.mobile);
            $(editUserId+' [name=gender]').val(data.gender);
            $(editUserId+' [name=state]').val(data.state);
            $(editUserId+' [name=city]').val(data.city);
            $(editUserId+' [name=id]').val(data.id);

            if(data.qualification.length > 0){
                var i = 0;
                for(i=0;i<data.qualification.length;i++){
                    $('input[type=checkbox][value='+data.qualification[i]+']').prop('checked', true);
                }
            }
        }
    });
}); 
$(document).on('click', '.delete', function(){
var id = $(this).attr("id");
var image_name = $(this).data("image_name");
if(confirm("Are you sure you want to remove it?"))
{
$.ajax({
    url:"delete.php",
    method:"POST",
    data:{id:id, image_name:image_name},
    success:function(data)
    {
    load_image_data();
    alert("record removed");
    }
});
}
}); 
$('#edit_user_form').on('submit', function(event){
    event.preventDefault();
    var userformId = '#edit_user_form';
    var errorDiv = '#error_update_div';

    var rowid = $(userformId+' [name=id]').val();
    var name = $(userformId+' [name=name]').val();
    if(name==''){
        $(errorDiv).html("<span class='text-danger'>name required</span>");
        return false;
    }
    var email = $(userformId+' [name=email]').val();
    if(email==''){
        $(errorDiv).html("<span class='text-danger'>email required</span>");
        return false;
    }
    var mobile = $(userformId+' [name=mobile]').val();
    if(mobile==''){
        $(errorDiv).html("<span class='text-danger'>mobile required</span>");
        return false;
    }
    var gender = $(userformId+' [name=gender]').val();
    if(gender ==''){
        $(errorDiv).html("<span class='text-danger'>gender required</span>");
        return false;
    }

    var qualification ='';
    if(parseInt($(userformId+' input[type=checkbox]:checked').length) < 1){
        $(errorDiv).html("<span class='text-danger'>qualification required</span>");
        return false;
    }else{
        var array = [];
        $(userformId+' input[type=checkbox]:checked').each(function() {
            array.push($(this).val());
        });
        qualification = array.toString();
    }

    var state = $(userformId+' [name=state]').val();
    if(state==''){
        $(errorDiv).html("<span class='text-danger'>state required</span>");
        return false;
    }
    var city = $(userformId+' [name=city]').val();
    if(city==''){
        $(errorDiv).html("<span class='text-danger'>city required</span>");
        return false;
    }

    
    if(name && email && mobile)
    {
        $.ajax({
            url:"update.php",
            method:"POST",
            data:{id:rowid,name:name,email:email,mobile:mobile,gender:gender,qualification:qualification,state:state,city},
            success:function(data)
            {
                $(errorDiv).html("<span class='text-danger'>Updated..</span>");
                $('#edit_user_modal').modal('hide');
                load_image_data();
            }
        });
    }
}); 
});
</script>