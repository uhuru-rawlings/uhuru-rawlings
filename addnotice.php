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
                    <div class="text">Add Notice</div>
                    <form action="#" method="post">
                         <label>Notice
                           <br>
                           <textarea name="notices" id="notices" required></textarea>
                         </label> 
                         <br>
                         <br>
                         <input type="submit" name="save" value="Post">  
                    </form>
                    <?php
                        if(isset($_POST['save'])){
                            include "connect.php";
                            $username = $_COOKIE['username'];
                            $content = trim($_POST['notices']);
                            $sql = "INSERT INTO notices(content,postedby)
                                 VALUES('$content','$username')";
                            $query = mysqli_query($connection, $sql);
                            if($query){
                               echo("<script>alert('Succesfully posted a notice')</script>");
                            }else{
                                echo("<script>alert('Error submiting your request, reload and try again')</script>");
                            }
                        }
                    ?>
                </div>
                <div class="form">
                    <div class="text">List Notice</div>
                    <form action="#" method="post">
                        <?php
                           include "connect.php";
                           $sql1 = "SELECT * FROM notices LIMIT 4";
                           $query1 = mysqli_query($connection, $sql1);
                           $rows = mysqli_num_rows($query1);

                           if($rows > 0){
                               echo("<table>");
                               echo("<tr>");
                               echo("<th>ID</th>");
                               echo("<th>By</th>");
                               echo("<th>Content</th>");
                               echo("<th>Date/Time</th>");
                               echo("</tr>");
                               while($result = mysqli_fetch_assoc($query1)){
                                   $note = $result['content'];
                                   $id = $result['id'];
                                   $user = $result['postedby'];
                                   $dates = $result['noticedate'];
                                   echo("<tr>");
                                   echo("<td>");
                                   echo($id);
                                   echo("</td><td>");
                                   echo($user);
                                   echo("</td><td>");
                                   echo($note);
                                   echo("</td><td>");
                                   echo($dates);
                                   echo("</td>");
                               }
                               echo("</tr>");
                               echo("<table>");
                           }
                        ?>    
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>