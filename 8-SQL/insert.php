  <?php  
 $connect = mysqli_connect("shareddb-r.hosting.stackcp.net", "UsersTemp-313233cb1c", "qgmv0cxycc", "UsersTemp-313233cb1c");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $firstName = mysqli_real_escape_string($connect, $_POST["firstName"]);  
      $lastName = mysqli_real_escape_string($connect, $_POST["lastName"]);  
      $userName = mysqli_real_escape_string($connect, $_POST["userName"]);  
      $emailAddress = mysqli_real_escape_string($connect, $_POST["emailAddress"]);  
      $passwordCreate = mysqli_real_escape_string($connect, $_POST["passwordCreate"]);  
      if($_POST["id"] != '')  
      {  
           $query = "  
           UPDATE users  
           SET firstname='$firstName',   
           lastname='$lastName',   
           username='$userName',   
           email = '$emailAddress',   
           password = '$passwordCreate'   
           WHERE id='".$_POST["id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO tbl_employee(name, address, gender, designation, age)  
           VALUES('$name', '$address', '$gender', '$designation', '$age');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM tbl_employee ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Employee Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["name"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>