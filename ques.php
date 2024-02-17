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
$id=$_GET['threadid'];
     $sql="SELECT * FROM threads where thread_id=$id";
     $result=mysqli_query($conn,$sql);
     
     while($row=mysqli_fetch_assoc($result)){
     
    
         $title=$row['thread_title'];
         $desc=$row['thread_desc'];
     }
?>
<?php
$showalert=false;
$method=$_SERVER['REQUEST_METHOD'];
IF($method=='POST'){
    $cth_title=$_POST['desc'];
    // $thread_id=$_POST['threadid'];
    $sql="INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_time`) VALUES ( '$cth_title', '$id', current_timestamp())";
    $result=mysqli_query($conn,$sql);
    $showalert=true;
}
?>
    <h1><?php echo $title?> </h1>
    <p><?php echo $desc ?> </p>
    <button><b>Posted by:ASHISH</b></button><hr><hr><hr><br><br>
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <div class=" container">
            <h1>Write Comments</h1>
      
        <label for="desctitle">Comments </label><br>
        <input type="text" name="desc"><br>
        <button>Submit</button>
    </form>
    </div><hr>
    <div class="container">
        <h1>Comments</h1>
        <?php
        $id=$_GET['threadid'];
        $sql="SELECT * FROM comments where thread_id=$id";
        $noresult=true;
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $noresult=false;
        
            $comment=$row['comment_content'];
            
            echo '<div class="ques">
            <h5> <a href="ques.php?threadid='.$id.'"></a>
            </h5>
    '.$comment.'
        </div>';
        }
        if($noresult){
            echo "No comment found";
        }
        ?>
    </div>
  
    <?php
    include 'footer.php';
    ?>
    
</body>
</html>