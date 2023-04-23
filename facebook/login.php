<?php
session_start();
if (isset($_SESSION['us_email']))
{
    header('Location: index.php');
    exit();
}

function validate($str)
{
    $str = trim($str);
    $str = htmlspecialchars($str);
    return $str;
}
if(isset($_POST['submit']))
{
    $uemail  = validate($_POST['uemail']);
    $passw = validate($_POST['passw']);
    $con = new mysqli("localhost","root","","upload");
    $query = "SELECT * FROM user_details WHERE email='$uemail' AND passw='$passw'";
    $result = $con->query($query);
    $r=mysqli_fetch_assoc($result);
    if($result->num_rows > 0)
    {
        $_SESSION['us_email'] = $uemail;
        $_SESSION['name']=$r["username"];
        $u=$_SESSION['name'];
        $query1="INSERT INTO `activeusers`( `username`) VALUES ('$u')";
        $m=$con->query($query1);
        if(isset($m)){
        echo '<script> alert("Login successful! "$u "");</script>';
        echo '<script> window.location.replace("index.php");</script>';
        }
    }
    else{
        echo '<script> alert("Invalid Credentials");</script>';
        echo '<script> window.location.replace("index.php");</script>';

    }


}
