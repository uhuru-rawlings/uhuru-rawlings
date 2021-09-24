<?php
  if(isset($_COOKIE['username'])){

  }else{
      header("location: login.php");
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="default.css">
    <title>Prison management system || dashboard</title>
</head>
<body>
    <div class="body">
        <div class="topbar">
            <?php
              echo("Welcome: ".$_COOKIE['username']);
            ?>
        </div>
        <div class="coll">
            <div class="rows1" id="rows">
                <ul>
                    <li>Wadens
                        <ul class="sub-menu">
                            <li><a href="default.php">Add Wadden</a></li>
                            <li><a href="listwaden.php">List Wadden</a></li>
                        </ul>
                    </li>
                    <li>Prisonners
                        <ul class="sub-menu">
                        <li><a href="enrole.php">New Prisonner</a></li>
                        <li><a href="listprisonner.php">List Prisoner</a></li>
                        <li><a href="search.php">Search</a></li>
                        </ul>
                    </li>
                    <li>Crimes
                        <ul class="sub-menu">
                        <li><a href="listcrimes.php">Crimes</a></li>
                        <li><a href="released.php">Released</a></li>
                        </ul>
                    </li>
                    <li>
                        Notices
                        <ul class="sub-menu">
                            <li><a href="addnotice.php">Add/List Notice</a></li>
                        </ul>
                    </li>
                    <li>Logout
                         <ul class="sub-menu">
                         <li><a href="logout.php">Logout</a></li>
                         </ul>
                    </li>
                </ul>
            </div>
            <div class="rows2">
                <div class="form">
                    <div class="text"> Add Wadden</div>
                    <form action="#" method="post">
                        <div class="formdata">
                        <div class="rows">
                            <label>FirstName
                                <br>
                                <input type="text" name="fname" id="fname" placeholder="Enter FirstName" required>
                            </label>
                            <br>
                            <br>
                            <label for="">SecondName
                                <br>
                                <input type="text" name="sname" id="sname" placeholder="Enter SecondName" required>
                            </label>
                            <br>
                            <br>
                            <label for="">FullName
                                <br>
                                <input type="text" name="fullname" id="fullname" placeholder="Enter Fullname" required>
                            </label>
                        </div>
                        <div class="rows">
                            <label for="">Contact
                                <br>
                                <input type="number" name="contact" id="contact" placeholder="Enter phoneNumber" required>
                            </label>
                            <br>
                            <br>
                            <label for="">Email
                                <br>
                                <input type="email" name="usermail"  id="usermail"placeholder="Enter UserEmail" required>
                            </label>
                            <br>
                            <br>
                            <label for="">County
                                <br>
                                <input type="text" name="county" id="county" placeholder="Enter County of Residence">
                            </label>
                        </div>
                        <div class="rows">
                            <label for="">Badge No.
                                <br>
                                <input type="text" name="badgeno" id="badgeno" placeholder="Enter badgeNumber" required>
                            </label>
                            <br>
                            <br>
                            <label for="">Previous Stattion
                                <br>
                                <input type="text" name="previousstation" id="previousstation" placeholder="Enter Previous station" required>
                            </label>
                        </div>
                        </div>
                        <br>
                        <input type="submit" value="Save" name="save">
                        <?php
                          if(isset($_POST['save'])){
                            include "connect.php";
                            $fname = mysqli_real_escape_string($connection, $_POST['fname']);
                            $sname = mysqli_real_escape_string($connection, $_POST['sname']);
                            $fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
                            $contact = mysqli_real_escape_string($connection, $_POST['contact']);
                            $useremail = mysqli_real_escape_string($connection, $_POST['usermail']);
                            $county = mysqli_real_escape_string($connection, $_POST['county']);
                            $badgeno = mysqli_real_escape_string($connection, $_POST['badgeno']);
                            $previousstation = mysqli_real_escape_string($connection, $_POST['previousstation']);

                            $sql = "INSERT INTO waddens(Fname,Sname,fullname,Contact,Usermail,County,badgeno,previousstation)
                                    VALUES('$fname','$sname','$fullname','$contact','$useremail','$county','$badgeno','$previousstation')";
                            $query = mysqli_query($connection,$sql);

                            if($query){
                                echo("<script>alert('Succesfully added a record')</script>");
                            }else{
                                echo("<script>alert('Error submitting your request')<script>");
                            }
                          }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>