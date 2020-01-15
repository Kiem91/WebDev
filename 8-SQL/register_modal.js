     <script type="text/javascript">
        $(document).ready(function(){  
          $("#insert_form").submit(function(e){
            e.preventDefault();
            $.ajax({
              url:"8-SQL/fetch.php",
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