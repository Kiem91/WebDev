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

                  <label>Email Address</label>  
                  <input type="text" name="emailAddress" id="emailAddress" class="form-control" />  
                  <br /> 

                  <label>Password</label>  
                  <input type="password" name="password" id="passwordCreate" class="form-control" />  
                  <br />

                  <label>User Type</label>
                  <select class="form-control" name="userType" id="userType">
                    <option>user</option>
                    <option>test</option>
                  </select>
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
                     $('#emailAddress').val(data.email);  
                     $('#passwordCreate').val(data.password);  
                     $('#userType').val(data.usertype);
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