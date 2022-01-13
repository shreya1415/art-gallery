<?php 
if(isset($_POST['submit'])) 
{  
    $conn = mysqli_connect("localhost", "root", "", "cart");
          
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }
  $filename=$_FILES['file']['name']; 
   $filetype=$_FILES['file']['type']; 
if($filetype=='image/jpeg' or $filetype=='image/png' or $filetype=='image/gif') 
{ 
 
$sql="insert into products values(10,'Painting','19',1700,'Shreya','$filename')"; 
if(mysqli_query($conn, $sql)){
    echo "<h3>data stored successfully.</h3>"; 

} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
}
} 
   
} 
?> 