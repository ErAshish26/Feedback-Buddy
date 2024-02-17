<?php
// session_start();
if(isset($_SESSION['loggedin'])||$_SESSION['loggedin']=true){
$loggedin=true;
}
else{
    $loggedin=false;
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Welcome to Threads</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    
</head>

<body> 

    <div class="nav">
        <?php include '_dbconnect.php';
        ?>
 

    </div>
    <?php
    if($loggedin){
         echo '  <a href="index.php">Home&ensp;&ensp;&ensp;&ensp;&ensp;</a><a href="signup.php">Register</a>&ensp;&ensp;&ensp;&ensp;
    <a href="login.php">Login</a>&ensp;&ensp;&ensp;&ensp;&ensp;
    <a href="thread.php">Thread&ensp;&ensp;&ensp;</a><input type="text"><button>Search</button><hr>';
    }
    ?>
<?php
if(!$loggedin){
    echo '<a href="logou.php">Logout</a>';
}
    ?>
   
   

<?php
    include 'footer.php';
    ?>
    
</body>
</html>