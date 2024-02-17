<?php
include '_dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Threads</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
$id=$_GET['catid'];
     $sql="SELECT * FROM categories where category_id=$id";
     $result=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result)){
     
     
         $catname=$row['category_name'];
         $catdesc=$row['category_desc'];
     }
?>
<?php
$showalert=false;
$method=$_SERVER['REQUEST_METHOD'];
IF($method=='POST'){
    $th_title=$_POST['title'];
    $th_desc=$_POST['desc'];
    $sql="INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `dt`) VALUES (' $th_title', ' $th_desc', '$id', '0', current_timestamp())";
    $result=mysqli_query($conn,$sql);
    $showalert=true;
}
?>

    <h1>Welcome to <?php echo $catname?> Foreum</h1>
    <p><?php echo $catdesc ?> </p>
    <button>Learn More</button><hr><hr><hr><br><br>
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <div class=" container">
            <h1>Ask a Question</h1>
        <label for="title">Thread Title </label><br>
        <input type="text" name="title"  ><br>
        <label for="desctitle">Describe Title </label><br>
        <input type="text" name="desc"><br>
        <button>Submit</button>
    </form>
    </div><hr>
    <div class="container">
        <h1>Browse Question</h1>
        <?php
        $id=$_GET['catid'];
        $sql="SELECT * FROM threads where thread_cat_id=$id";
        $noresult=true;
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $noresult=false;
            $id=$row['thread_id'];
            $dt=$row['dt'];
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            echo '<div class="ques">
            <p> <a href="ques.php?threadid='.$id.'">'.$title.' </a>    
        
            </h5>
    '.$desc.'  
    <p>'.$dt.'</p>
        </div>';
        }
        if($noresult){
            echo "No Thread found";
        }
       
        ?>
  
  
    <?php
    include 'footer.php';
    ?>
    <?php
    if($showalert){
        echo '';
    }
    ?>

</body>
</html>