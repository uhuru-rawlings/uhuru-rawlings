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
                    <div class="text"> List Wadden</div>
                    <form action="#" method="post">
                        <?php
                           include "connect.php";
                           $sql = "SELECT * FROM waddens";
                           $query = mysqli_query($connection, $sql);
                           $rows = mysqli_num_rows($query);
                           if($rows > 0){
                            echo("<table>");
                            echo("<tr>");
                                echo("<th>Fname</th>");
                                echo("<th>Sname</th>");
                                echo("<th>FullName</th>");
                                echo("<th>Contact</th>");
                                echo("<th>Email</th>");
                                echo("<th>County</th>");
                                echo("<th>Badge No.</th>");
                                echo("<th>Prev. Station</th>");
                            echo("</tr>");
                               while($results = mysqli_fetch_assoc($query)){
                                    echo("<tr><td>");
                                    echo($results['Fname']);
                                    echo("</td><td>");
                                    echo($results['Sname']);
                                    echo("</td><td>");
                                    echo($results['fullname']);
                                    echo("</td><td>");
                                    echo($results['Contact']);
                                    echo("</td><td>");
                                    echo($results['Usermail']);
                                    echo("</td><td>");
                                    echo($results['County']);
                                    echo("</td><td>");
                                    echo($results['badgeno']);
                                    echo("</td><td>");
                                    echo($results['previousstation']);
                                    echo("</td></tr>");
                               }
                               echo("</table>");
                           }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>