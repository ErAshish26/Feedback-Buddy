
<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome<?php  echo $_SESSION['name']  ?></title>
</head>
<body>
Welcome<?php  echo $_SESSION['name']  ?>
<a href="logou.php">Logout</a>
<div class="container">
    
</div>
</body>
</html>






<?php
include '_dbconnect.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Asag Threads</title>
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h2>Welcome to  Online Fourem Discussion</h2>

<!-- <img src="forum.jpeg" alt="error"> -->
<?php
        $sql="SELECT * FROM categories";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            // echo $row['category_id'];
            // echo $row['category_name'];
            // echo $row['category_desc'];
            $id=$row['category_id'];
            $cat=$row['category_name'];
            $desc=$row['category_desc'];
            
           
        
echo '<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="" alt="Welcome>
  <div class="card-body">
    <h5 class="card-title"><a href="threads.php?catid='.$id.'">'.$cat.'</a></h5>
    <p class="card-text">'.$desc.'</p>
    <a href="threads.php?catid='.$id.'" class="btn btn-primary">View</a>
  </div>
</div>';
}

?>
<?php
include 'footer.php';
?>
</body>
</html>








