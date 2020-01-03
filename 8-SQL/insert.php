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
           INSERT INTO users(firstname, lastname, username, email, password)  
           VALUES('$firstname', '$lastname', '$username', '$email', '$password');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM users ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th>First Name</th>  
                          <th>Last Name</th>  
                          <th>Username</th>
                          <th>Email address</th>   
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["firstname"] . '</td>
                          <td>' . $row["lastname"] . '</td>
                          <td>' . $row["username"] . '</td>
                          <td>' . $row["email"] . '</td>
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>