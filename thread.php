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
<div class="nav">
    <li><a href=""></a></li>
    <li><a href="signup.php">Register&ensp;&ensp;&ensp;&ensp;&ensp;</a></li>
    <li><a href="login.php">Login&ensp;&ensp;&ensp;&ensp;&ensp;</a></li><hr>
    <li><a href=""></a></li>
</div>
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
  <img class="card-img-top" src="forum.jpeg" alt="">
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