<?php
session_start();
if(isset($_SESSION['us_email']))
{
    unset($_SESSION['us_email']);
    $u=$_SESSION["name"];
    $con=new mysqli("localhost","root","","upload");
    $query="DELETE FROM `activeusers` WHERE username='$u'";
    $r=$con->query($query);
    if(isset($r)){
    unset($_SESSION["name"]);
    session_destroy();
    header("Location: index.php");
    }
}
else
{
    header("Location: index.php");
}
?>
