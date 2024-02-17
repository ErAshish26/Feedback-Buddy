<?php
 $login=false;
 $showerr=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    include '_dbconnect.php';
$name=$_POST["name"];
$password=$_POST["pass"];


    $sql="SELECT * FROM ashish where name='$name' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['name']=true;
        header("location:welcome.php");


    }

else{
    $showerr="Invalid Credintials";
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="index.php">Home</a>
<?php
        if($login){
        echo '<div class="alert1">
            <p>Success! You Logged in Successfully</p>
        </div>';
        }
        if($showerr){
            echo '<div class="alert">
                <p>'.$showerr.'</p>
            </div>';
            }
        ?>
    <div class="container">
        <h1>Login  Here</h1>
        <form name="myform" action="/Ashish/login.php" onsubmit="return validateform()" method="post">
       
        <label for="name">Username</label><br>
        <input type="text" name="name" id="name"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="pass" id="pass" ><br><br>
        
        <div class="btn">
            <button>Login</button><br>
            <a href="/Ashish/signup.php">Register Here</a>
        </div>
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
      
    }
</script>
</body>
</html>