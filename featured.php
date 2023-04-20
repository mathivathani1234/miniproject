<?php

include ('./connect.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $mobile=$_POST['mobile'];
    $image=$_FILES['file'];

    //echo $username;
    //echo "<br>";
    //echo $mobile;
    //echo "<br>";
    //print_r($image);
    //echo "<br>";

    $imagefilename=$image['name'];
    //print_r($imagefilename);
    //echo "<br>";

    $imagefileerror = $image['error'];
    //print_r($imagefileerror);
    //echo "<br>";

    $imagefiletemp=$image['tmp_name'];
    //print_r($imagefiletemp);
    //echo "<br>";

    $filename_seperate=explode('.',$imagefilename);
   // print_r($filename_seperate);
  // echo "<br>";
   // $file_extension=strtolower($filename_seperate[1]);
    //print_r($file_extension);

    $file_extension=strtolower(end($filename_seperate));
   // print_r($file_extension);

    $extension=array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `uploadbooks`(name,mobile,image) values('$username','$mobile','$upload_image')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
            <strong>Success</strong>  Data Inserted Successfully
          </div>';

        } else{
            die(mysqli_error($con));
        }
    }


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        img{
            width:100px;

        }
       </style> 
</head>
<body>
<center><h1>Featured</h1></center>
    <a href="index.php">Home</a>
    <h1 class = "text-center my-4">User data</h1>
    <div class="container mt-5 d-flex justify-content-center">
    <table class="table table-bordered w-50">
  <thead class="table-dark">
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Username</th>
      <th scope="col">Mobile</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql="Select * from `uploadbooks`";
  $result=mysqli_query($con,$sql);
  while( $row=mysqli_fetch_assoc($result)){

    $id=$row['id'];
    $name=$row['name'];
    $mobile=$row['mobile'];
    $image=$row['image'];
    echo ' <tr>
    <td>'.$id.'</td>
    <td>'.$name.'</td>
    <td>'.$mobile.'</td>
    <td><img src='.$image.'/></td>
  </tr>';
  }
  





?>
    
  
  </tbody>
</table>
</body>
</html>