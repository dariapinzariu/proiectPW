<?php
require_once "config.php";
$msg="";
if(isset($_POST['upload'])){
    $target="./images/".md5(uniqid(time())).basename($_FILES['image']['name']);
    $text=$_POST['text'];
    $sql="INSERT INTO images(title, image)VALUES('$text', '$target')";
    mysqli_query($con, $sql);
    if(move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
        header('location:imgg.php');
    } else {
        $msg="Oh the misery!";
        echo $msg;
    }
}