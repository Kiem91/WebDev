<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>

	<div class="login-form">
	    <form action="index.php" method="post">
	        <h2 class="text-center">Log in</h2>       
	        <div class="form-group">
	        	<label for="username">Username/Email address</label>
	            <input type="text" class="form-control" placeholder="Username/Email" required="required" id=usernameInput name="username">
	        </div>
	        <div class="form-group">
	        	<label for="password">Password</label>
	            <input type="password" class="form-control" placeholder="Password" required="required" id=passwordInput name="password">
	        </div>
	        <div class="form-group">
	            <button type="submit" class="btn btn-primary btn-block">Log in</button>
	            <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Register</button>
	        </div>       
	    </form>


 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">User Registration</h4>  
                </div>  
                <div class="modal-body" id="user_registration">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">User Registration</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>First Name</label>  
                          <input type="text" name="firstName" id="firstName" class="form-control" />  
                          <br />  
                          <label>Last Name</label>  
                          <input type="text" name="lastName" id="lastName" class="form-control" />  
                          <br />  
                          <label>User Name</label>  
                          <input type="text" name="userName" id="userName" class="form-control" />  
                          <br />  
                          <label>Email Address</label>  
                          <input type="text" name="emailAddress" id="emailAddress" class="form-control" />  
                          <br />  
                          <label>Password</label>  
                          <input type="password" name="password" id="passwordCreate" class="form-control" />  
                          <br />  
                          <label>Confirm Password</label>  
                          <input type="password" name="password" id="passwordConfirm" class="form-control" />  
                          <br />  
                          <input type="hidden" name="id" id="id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	  $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#firstName').val(data.firstname);  
                     $('#lastName').val(data.lastname);  
                     $('#userName').val(data.username);  
                     $('#emailAddress').val(data.email);  
                     $('#passwordCreate').val(data.password);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#firstName').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#lastName').val() == "")  
           {  
                alert("Name is required");  
           } 
           else if($('#userName').val() == '')  
           {  
                alert("Username is required");  
           }  
           else if($('#emailAddress').val() == '')  
           {  
                alert("Email address is required");  
           }  
           else if($('#passwordCreate').val() == '')  
           {  
                alert("Password is required");  
           } 
           else if ($('#passwordCreate') !== $('#passwordConfirm')) {
           		alert("Passwords entered do not match");
           } 
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          //$('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data){  
                          //$('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
    </script>


  </body>
</html>