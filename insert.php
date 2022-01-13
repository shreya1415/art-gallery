<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "artists");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $first_name =  $_REQUEST['first_name'];
 
        $email = $_REQUEST['email'];
        $message=$_REQUEST['Your_message'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO artist_info  VALUES ('$first_name', 
            '$email','$message')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored successfully.</h3>"; 
  
            echo nl2br("\n$first_name\n $email\n$message");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
    
</body>
  
</html>