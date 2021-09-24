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
                    <div class="text">Released</div>
                    <form action="#" method="post">
                        <div class="coll">
                            <label for="">Fullname
                                <br>
                                <input type="text" name="fullname" id="fullname" placeholder="Enter fullname" required>
                            </label>
                            <br>
                            <br>
                            <label for="">ReleseDate
                                <br>
                                <input type="date" name="releasedate" id="releasedate" placeholder="" required>
                            </label>
                            <br>
                            <br>
                            <label for="">Case
                                <br>
                                <input type="text" name="casedescription" id="casedescription" placeholder="Enter case description" required>
                            </label>
                        </div>
                        <br>
                        <br>

                        <input type="submit" value="Save" name="save">
                        <?php
                          if(isset($_POST['save'])){
                            include "connect.php";
                             $fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
                             $releasedate = mysqli_real_escape_string($connection, $_POST['releasedate']);
                             $description = mysqli_real_escape_string($connection, $_POST['casedescription']);

                             $sql = "INSERT INTO released(fullname,releasedate,casedescription)
                                    VALUES('$fullname','$releasedate','$description')";
                             $query = mysqli_query($connection, $sql);
                             if($query){
                                 echo("<script>alert('Succesfully added a new record')</script>");
                             }else{
                                 echo("<scrip>alert('Error submitting request, reload and try again')</script>");
                             }
                          }
                        ?>
                    </form>
                    <?php
                      include "connect.php";
                      $sql1 = "SELECT * FROM released";
                      $query1 = mysqli_query($connection, $sql1);
                      $rows = mysqli_num_rows($query1);
                      if($rows > 0){
                          echo("<table>");
                          echo("<tr>");
                          echo("<th>ID</th>");
                          echo("<th>FullName</th>");
                          echo("<th>Description</th>");
                          echo("</tr>");
                          echo("<tr>");
                          while($results = mysqli_fetch_assoc($query1)){
                            echo("<td>");
                            echo($results['id']);
                            echo("</td><td>");
                            echo($results['fullname']);
                            echo("</td><td>");
                            echo($results['releasedate']);
                            echo("</td><td>");
                            echo($results['casedescription']);
                            echo("</td>");
                          }
                          echo("</tr>");
                          echo("</table>");
                      }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>