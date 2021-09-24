<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>prison mamagement system || login form</title>
</head>
<body>
    <div class="form">
        <?php
           if(isset($_POST['login'])){
           include "connect.php";
               $username = mysqli_real_escape_string($connection, $_POST['username']);
               $pasword = trim($_POST['passwords']);

               $sql = "SELECT * FROM userreg WHERE username ='".$username."'";
               $query  = mysqli_query($connection, $sql);
               $rows = mysqli_num_rows($query);
               if($rows > 0){
                   while ($result = mysqli_fetch_assoc($query)){
                       $passw = $result['pass_word'];
                       $passwordverify = password_verify($pasword, $passw);
                       if($passwordverify){
                           setcookie("username", $_POST['username'],time()+3600);
                         header("location: default.php");
                       }else{
                           echo("<script>alert('Wrong password, please check your password')</script>");
                       }
                   }
               }else{
                   echo("<script>alert('No user with this username')</script>");
               }
           }
        ?>
        <div class="text">Login Form</div>
        <form action="#" method="post">
            <label for="">Username
                <br>
                <input type="text" name="username" id="username" placeholder="Enter username">
            </label>
            <br>
            <br>
            <label for="">Password 
                <br>
                <input type="password" name="passwords" id="passwords" placeholder="Enter password">
            </label>
            <br>
            <br>
            <input type="submit" value="Login" name="login">
            <br>
            <br>
            <a href="signup.php">Dont have account ?</a>
        </form>
    </div>
</body>
</html>