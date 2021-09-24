<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>prison management system || signup form</title>
</head>
<body>
    <div class="form">
        <div class="text">Signup Form</div>
        <form action="#" method="post">
            <?php
                if(isset($_POST['signup'])){
                    include "connect.php";
                    $fname = mysqli_real_escape_string($connection,$_POST['firstname']);
                    $lname  = mysqli_real_escape_string($connection, $_POST['secondname']);
                    $uname = mysqli_real_escape_string($connection, $_POST['username']);
                    $usertype = $_POST['usertype'];
                    $passwd = trim($_POST['passwords']);
                     
                    $passwordhash = password_hash($passwd, PASSWORD_DEFAULT);
                    $userid = "KP_".rand(1000, 100000);

                    $sql = "SELECT * FROM userreg WHERE username ='".$uname."'";
                    $query = mysqli_query($connection, $sql);
                    if($rows = mysqli_num_rows($query) < 1){
                        $mainsql = "INSERT INTO userreg(Fname,Lname,username,userid,pass_word,usertype)
                                     VALUES('$fname','$lname','$uname','$userid','$passwordhash','$usertype')";
                        
                        $mainquery = mysqli_query($connection, $mainsql);
                        if($mainquery){
                              header("location: login.php");
                        }else{
                            echo("<script>alert('Error submiting your request, please reload and try again')</script>");
                        }
                    }else{
                        echo("<script>alert('User with same username already exist')</script>");
                    }
                }

            ?>
            <div class="coll">
            <div class="rows">
            <label for="">FirstName
                <br>
                <input type="text" name="firstname" id="firstname" placeholder="Enter First Name" required>
            </label>
            <br>
            <br>
            <label for="">SecondName
                <br>
                <input type="text" name="secondname" id="secondname" placeholder="Enter Second Name" required>
            </label>
            <br>
            <br>
            <label for="">Username
                <br>
                <input type="text" name="username" id="username" placeholder="Enter username(John Doe)" required>
            </label>
            </div>
            <div class="rows">
            <label for="">Password
                <br>
                <input type="password" name="passwords" id="passwords" placeholder="Enter password" required>
            </label>
            <br>
            <br>
            <label for="">ConfirmPassword
                <br>
                <input type="password" name="confirmpasswords" id="confirmpasswords" placeholder="Confirm password" required>
            </label>
            <br>
            <br>
            <label for="">UserType
                <br>
                <select name="usertype" id="usertype">
                <option value="Wadden">Wadden</option>
                <option value="It_Support">It_Support</option>
            </select>
            </label>
            </div>
            </div>
            <br>
            <br>
            <input type="submit" value="Sign up" name="signup" onclick="return validate()">
        </form>
        <script>
            function validate(){
                let p = document.getElementById('passwords');
                let cp = document.getElementById('confirmpasswords');

                if(p.value == cp.value){

                }else{
                    alert('Password dont match');
                    document.getElementById('passwords').style.border = "1px solid red";
                    document.getElementById('confirmpasswords').style.border = "1px solid red";
                    return false;
                }
            }
        </script>
    </div>
</body>
</html>