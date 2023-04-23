<?php
session_start();


$con= new mysqli('localhost','root','','upload');

if(isset($_POST["submit"])){
$image_id = $_POST["image_id"];
$user_id = $_SESSION["name"];
$sql1="SELECT * FROM `post_likes` WHERE username='$user_id' AND post_id='$image_id';";
$result = $con->query($sql1);
$rowcount = mysqli_num_rows( $result );
if ($rowcount >0) {
  // echo "<script>alert('You have already liked this image.')</script>";
}
else {
  $sql = "UPDATE images SET likes=likes+1 WHERE id=' $image_id'";
    if ($con->query($sql) === TRUE) {
      // echo "<script>alert('Like added successfully.')</script>";
    }
    else {
      // echo "Error adding like: " . $con->error;
    }
    $sql = "INSERT INTO post_likes(username,post_id) VALUES ('$user_id',$image_id)";
  if ($con->query($sql) === TRUE) {
    // echo "<script>alert('Like recorded successfully.')</script>";
  }
  else {
    // echo "Error recording like: " . $con->error;
  }
}
}
$con->close();
echo '<script>window.location.replace("index.php");</script>';
?>
