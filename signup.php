<?php
 $err=false;
 $showerr=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    include '_dbconnect.php';
$name=$_POST['name'];
$password=$_POST['pass'];
$cpassword=$_POST['pass1']; 
$exists=false;
if(($password==$cpassword) && $exists==false){
    $hash=password_hash($password,PASSWORD_DEFAULT);
    $sql="INSERT INTO `ashish` ( `name`, `password`) VALUES ('$name', '$password')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $err=true;

    }
}
else{
    $showerr="Password do not match";
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Home</a>
<?php
        if($err){
        echo '<div class="alert1">
            <p>Success! Account Created Successfully</p>
        </div>';
        }
        if($showerr){
            echo '<div class="alert">
                <p>'.$showerr.'</p>
            </div>';
            }
        ?>
    <div class="container">
        <h1>Signup Here</h1>
    
        <form name="myform" action="/Ashish/signup.php" method="post" onsubmit="return validateform()">

        <label for="name">Username</label><br>
        <input type="text" name="name" id="name"><br><br><hr>
        <label for="password">Password</label><br>
        <input type="password" name="pass" id="pass" ><br><br><hr>
        <label for="name">Confirm Password</label><br>
        <input type="password" name="pass1" id="pass1"><br><br><hr>
        <div class="btn">
            <button>Signup</button><br>
           
        </div>
        <a href="/Ashish/login.php">Login Here</a>
        </form>
    </div>
    
<script>
     function validateform(){
       let x = document.forms["myform"]["name"].value;
       if(x ==""){
        alert("Username cant't be blank");
        return false;
       }
       
     
       
       let z = document.forms["myform"]["pass"].value;
       if(z ==""){
        alert("Password  cant't be blank");
        return false;
       }
       let p = document.forms["myform"]["pass1"].value;
       if(z !=p){
        alert(" Confirm Password  should be same");
        return false;
       }

    }
</script>
</body>
</html>