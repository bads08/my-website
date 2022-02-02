<?php
 require_once "../../config/conn.php";
 if (!empty($_POST["name"])) {
     $img  = $_POST["img"];
     $tag  = $_POST["tag"];
     $name = $_POST["name"];
     $link = $_POST["link"];
     $date = date("Y-m-d");

     $sql = "INSERT INTO `downloads`(`img`, `label`, `name`, `link`, `date_created`) 
             VALUES ('$img','$tag','$name','$link','$date')";
     $query = $conn->query($sql);
     if ($query === TRUE) {
         echo "success";
     }
 }else {
     echo "empty";
 }
?>