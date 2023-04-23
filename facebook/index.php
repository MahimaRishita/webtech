<?php
session_start();
$vis = true;
if(isset($_SESSION['us_email']))
{
    $vis = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

     <title>Facebook</title>

     <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="index.css">
    <style>
       .photo {
            width: 100%;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .photo img {
        max-width: 100%;
        max-height: 100%;
        }
        p{
            font-size: 14px;
            line-height: 1.5;
            color: #262626;
            margin: 8px 0;
        }
        .profile1{
            margin-top:125px;
            display:flex;
            justify-content:center;

        }
        .form1
        {
            margin:10px;
            margin-left:200px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            padding:20px;
            box-shadow:inset 0 1px 1px rgba(0, 0, 0, .2), 0 .5px .5px rgba(0, 0, 0, .2);
            border-radius:10px;
            width:500px;
        }
        th,td{
            font-size:15px;
        }
        .float{
            display:flex;
            flex-direction:row;
        }
        .float form{
            margin:15px;

        }
        .end{
            margin:20px;
            padding:10px;
            top:50px;
            box-shadow: 0px 5px 3px 3px rgba(0,0,0,0.4);
            border-radius:5px;
            align-items:center;
        }
        .view{
            margin:10px;

        }

        a{
            color:white;
        }
        main{
        margin-top:200px;
        font-size:30px;
        }
        .social{
            color:white;
            text-decoration:none;
        }
        .form {
            width: 300px;
            background-color: rgba(255, 255, 255, 1);
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, .2);
            border-radius: 5px;
            justify-content:center;

            }

            .input {
            font-size: 15px;
            padding: 15px 10px;
            border-radius: 5px;
            border: none;
            margin-top: 10px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .2), 0 .5px .5px rgba(0, 0, 0, .2);
            outline: none;
            }

            .input:focus {
            outline: 1.2px solid #1877f2;
            }

            #loginBtn {
            margin-top: 10px;
            width: 100%;
            padding: 10px 20px;
            align-self: center;
            background: #5C9090;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1.3rem;
            font-weight: bold;
            }

            #loginBtn:hover {
            background: #5C9090;
            }

            #forgotPassword {
            text-align: center;
            position: relative;
            margin-top: 10px;
            width: 100%;
            font-size: 13px;
            align-self: center;
            font-weight: bold;
            color:#5C9090;
            }

            #forgotPassword::after {
            position: absolute;
            content: '';
            width: 100%;
            height: .5px;
            bottom: -25px;
            left: 0;
            background: #dadde1;
            }

            #forgotPassword:hover {
            text-decoration: underline;
            }

            #createAccountBtn {
            margin-top: 40px;
            margin-bottom: 10px;
            padding: 15px 15px;
            align-self: center;
            background: #355C7D;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            }

            #createAccountBtn:hover {
            background: #355C7D;
            }
            h1{
                padding:20px;
            }
            .container{
                margin:20px;
                padding:10px;
                top:50px;
                display:flex;
                justify-content:center;
                box-shadow: 0px 5px 3px 3px rgba(0,0,0,0.4);
                border-radius:5px;
                width:540px;
                align-items:center;

            }

            .profile{
                margin:50px;
                display: flex;
                flex-direction: column;
                justify-content: right;
                align-items: center;
                padding:10px;
            }
            .feed{
                margin:10px;
                padding:10px;

            }
            .comment{
                box-shadow:0px 2px 2px 2px rgba(0,0,0,0.5);
                border-radius:10px;
                width:100%;
                height:60px;
                margin:5px;
                padding:10px;
            }
            .photo{
                margin:2px;
                padding:2px;
            }

            .navbar{
              margin-top: 10px;
              width: 100%;
              padding: 10px 20px;
              align-self: center;
              background: #5C9090;
              border: none;
              border-radius: 5px;
              color: #fff;
              font-size: 1.3rem;
              font-weight: bold;
            }
            .space{
              margin-right: 50px;
            }


    </style>

</head>

<body>
    <header>

        <nav class="navbar">

            <?php
            if($vis == false)
            {
                echo'<a class="space" href="profile.php">profile</a>';
                echo'<a class="space" href="upload.php">upload</a>';
                echo '<a class="space" href="logout.php">logout</a>';
            }
            ?>
        </nav>
    </header>

        <?php
        if($vis==TRUE){
            echo'
            <main class="profile1">
            <div class="logos">
            ';
                        echo'

                        <h2>Users of top three likes</h2>';
                        $con=new mysqli("localhost","root","","upload");
                        if(isset($con)){
                        $sql="SELECT * FROM `images` ORDER BY likes DESC LIMIT 3;";
                        $top=$con->query($sql);
                        $j=1;
                        echo'<table cellspacing="35" cellpadding=6 style="border-style: outset; "><tr><th>si.no</th><th>image</th><th>name</th><th>likes</th></tr>';
                        while($i=mysqli_fetch_assoc($top))
                        {   $likes=$i["likes"];
                            $t=$i["filename"];
                            $s="uploads/" . $t;
                            echo'<tr><td>'.$j.".</td><td ><img src='".$s."'alt='img'Style='height:100px; width:100px;'></td><td>".$i["uname"].'</td><td>'.$likes.'</td></tr>';
                            $j+=1;
                        }
            echo'</table>
            </div>
            </div>
            </div>';}
       echo'
                <form class="form1" action="login.php" method="POST">
                    <h2 style="margin-left:20px;text-align:center;margin-bottom:100px;">Facebook</h2>
                    <input placeholder="Email address or phone number"name = "uemail" class="input" type="text">
                    <input placeholder="Password" name="passw" class="input" type="password" id="password">
                    <button id="loginBtn"name="submit" type="submit">Log in</button>
                    <a id="forgotPassword" href="reset.html">Forgotten password?</a>
                    <button class="create" id="createAccountBtn"><a href="signup.php">Create new account</a></button>
                </form>
                </main>
                ';
        }
        if($vis == False){

        echo'<main class="profile">
        <div class="start"></div><div class="middle">';

            $con=new mysqli("localhost","root","","upload");
            $query="SELECT  `id`,`filename`, `description`, `uname`, `likes` FROM `images`ORDER BY id DESC";
            $r=$con->query($query);
            while($row= mysqli_fetch_assoc($r))
            {
                $u=$row["uname"];
                $t=$row["filename"];
                $s="uploads/" . $t;
                $d=$row["description"];
                $imgid=$row["id"];
                $likes=$row["likes"];
            echo'

                <div class="container">
                <div class="feed">
                <h5>'.$u.'</h5>
                <div class="photo">
                <img src="'.$s.'"alt=""></div>*9
                <p>'.$d.'</p>
                <div class="float">
                <form action="like.php" method="POST">
                <input type="hidden" name="image_id" value="' . $imgid . '" />
                <button class="btn" name="submit" type="submit"><i class="uil uil-heart" ></i>'.$likes.'</button>
                </form>
                <form action="index.php";. method="POST">

                <input name="comm" type="text"placeholder="comment..." >
                <input type="hidden" name="image_id" value="' . $imgid . '" />
                <button name="submit" type="submit" class="btn">Send</button></form></div><div id="view" class="view" >';
                        $q="SELECT `id`, `img_id`, `username`, `comment`, `timesatmp` FROM `comments` WHERE `img_id`='$imgid'";
                        $c=$con->query($q);
                        if(isset($c))
                        {
                            while($com=mysqli_fetch_assoc($c))
                            {
                                $commenter=$com['username'];
                                $des=$com['comment'];
                                echo'<p><b>'.$commenter.'</b></p>';
                                echo'<p>'.$des.'</p>';
                            }
                        }
                echo'
                </div>

                </div>
                </div>  '   ;
                echo'<script>
                var comments = document.getEleme-

      ntById("view");
                var showButton = document.getElementById("showComments");

                function toggleComments() {
                if (comments.style.display === "none") {
                    comments.style.display = "block";
                    showButton.innerHTML = "Hide Comments";
                } else {
                    comments.style.display = "none";
                    showButton.innerHTML = "Show Comments";
                }
                }

                showButton.addEventListener("click", toggleComments);
            </script>';
            }
            echo'</div>
            <div>
            <div class="end" >

            <h3>active users</h3>
            ';
            $query="SELECT * FROM `activeusers` ";
            $res=$con->query($query);
            if(isset($res))
                {
                    while($com=mysqli_fetch_assoc($res))
                    {
                        $commenter=$com['username'];
                        echo'<p><b>'.$commenter.'</b></p>';
                    }
                }

            echo'</div></main>';


            if(isset($_POST["submit"]))
            {
                $i=$_POST['image_id'];
                $c=$_POST['comm'];
                $u=$_SESSION["name"];
                $con= new mysqli("localhost","root","","upload");
                $query="INSERT INTO `comments`(`img_id`, `username`, `comment`) VALUES ('$i','$u','$c')";
                $r=$con->query($query);
                if(isset($r))
                {
                    // echo"<script>alert('commented');</script>";
                    echo '<script> window.location.replace("index.php");</script>';
                }
            }
        }
        ?>


</body>

</html>
