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
                    <div class="text"> Add Prisonner</div>
                    <form action="#" method="post" enctype="multipart/form-data">
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
                            <label for="">Gender
                                <br>
                                <select name="gender" id="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </label>
                            <br>
                            <br>
                            <label for="">Image
                                <br>
                                <input type="file" name="wimage" id="wimage" required>
                            </label>
                        </div>
                        <div class="rows">
                            <label for="">DoB
                                <br>
                                <input type="date" name="dateofbirth" id="dateofbirth" placeholder="Enter badgeNumber" required>
                            </label>
                            <br>
                            <br>
                            <label for="">Crime Description
                                <br>
                                <input type="text" name="crimedescription" id="crimedescription" placeholder="Enter Crime description" required>
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
                            $useremail = mysqli_real_escape_string($connection, $_POST['gender']);
                            $county = mysqli_real_escape_string($connection, $_POST['dateofbirth']);
                            $images = $_FILES['wimage'];
                            
                            $previousstation = mysqli_real_escape_string($connection, $_POST['crimedescription']);

                            $filename = $_FILES['wimage']['name'];
                            $tempname = $_FILES['wimage']['tmp_name'];
                            $size = $_FILES['wimage']['size'];
                            $error = $_FILES['wimage']['error'];

                            if($size > 1000){
                                echo("<script>alert('File size too lerge')</script>");
                            }else{}
                                $extension = explode(".",$filename);
                                $extensiontolower = strtolower(end($extension));
                                $accepted =array("jpg","png","jpeg");
                                if(in_array($extensiontolower, $accepted)){
                                      $newname = "primg".rand(1000, 100000000);
                                      $fullfilename = $newname.".".$extensiontolower;
                                      $location = "uploaded/".$fullfilename;
                                      $movefiles = move_uploaded_file($tempname, $location);
                                      if($movefiles){
                                       $sql = "INSERT INTO prisonners(Fname,Sname,fullname,Contact,gender,dob,descriptions,images)
                                                VALUES('$fname','$sname','$fullname','$contact','$useremail','$county','$previousstation','$fullfilename')";
                                        $query = mysqli_query($connection,$sql);
   
                                        if($query){
                                            echo("<script>alert('Succesfully added a record')</script>");
                                        }else{
                                            echo("<script>alert('Error submitting your request')<script>");
                                        }
                                      }else{
                                          echo("<script>alert('Error uploading file, contact your system admin')</script>");
                                      }
                                }else{
                                    echo("<script>alert('File extension not allowed')</script>");
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