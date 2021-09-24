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
                    <div class="text">Search Prisonner</div>
                    <form action="#" method="post">
                        <label for="">FirstName
                            <br>
                            <input type="text" name="fullname" id="fullname" placeholder="Enter user to search" required>
                        </label>
                        <br>
                        <br>
                        <input type="submit" value="Search" name="search">
                        <br>
                        <br>
                        <div class="text">Search Result</div>
                            <?php
                              if(isset($_POST['search'])){
                                  include "connect.php";
                                  $name = mysqli_real_escape_string($connection, $_POST['fullname']);
                                  $sql = "SELECT * FROM prisonners WHERE fname='".$name."'";
                                  $query = mysqli_query($connection,$sql);

                                  $rows = mysqli_num_rows($query);
                                  if($rows > 0){
                                echo("<table><tr>");
                                echo("<th>Image</th>");
                                echo("<th>FullName</th>");
                                echo("<th>Contact</th>");
                                echo("<th>Gender</th>");
                                echo("<th>DoB</th>");
                                echo("<th>Description</th>");
                                echo("</tr>");
                                  while($results = mysqli_fetch_assoc($query)){
                                    if(empty($results['images'])){
                                        echo("<tr><td>");
                                        echo("<img src='icons/default.png' title='".$results['fullname']."' width='70px' height='70px'>");
                                        echo("</td><td>");
                                        echo($results['fullname']);
                                        echo("</td><td>");
                                        echo($results['contact']);
                                        echo("</td><td>");
                                        echo($results['gender']);
                                        echo("</td><td>");
                                        echo($results['dob']);
                                        echo("</td><td>");
                                        echo($results['descriptions']);
                                        echo("</td></tr>");  
                                    }else{
                                        $image = "uploaded/".$results['images'];
                                        echo("<tr><td>");
                                        echo("<img src='".$image."' title='".$results['fullname']."' width='70px' height='70px'>");
                                        echo("</td><td>");
                                        echo($results['fullname']);
                                        echo("</td><td>");
                                        echo($results['contact']);
                                        echo("</td><td>");
                                        echo($results['gender']);
                                        echo("</td><td>");
                                        echo($results['dob']);
                                        echo("</td><td>");
                                        echo($results['descriptions']);
                                        echo("</td></tr>");
                                    }
                               }
                               echo("</table>");
                                  }else{
                                      echo("No result found");
                                  }
                              }
                            ?>
                         </div>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>