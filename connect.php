<?php
$connection = mysqli_connect("127.0.0.1","root","","prison_management_system");
if($connection){

}else{
    echo("<script>alert('Cannot connect to the server')</script>");
}