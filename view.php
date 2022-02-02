<?php
 require_once "config/conn.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dist/css/mystyle.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Home</title>
    <style>
        .btn-success{
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            background-color: #3d7702;
            color: white;
            border: none;
        }
        .btn-success:hover{
            background-color: #7a7a79;
            cursor: pointer;
        }
        span.title{
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
       <div class="banner">
        <a href="home.php"><img src="dist\img\banner.png" alt="" width="100%"></a>
       </div>
    </div>
    <nav>
        <div class="container">
          <ul class="nav">
              <li><a href="home.php">Home</a></li>
              <li><a href="">Link 1</a></li>
              <li><a href="">Link 2</a></li>
          </ul>
        </div>
   </nav>
        <div class="container"> 
            <br>
            <br>
       
         <?php
          $getId = $_GET["view"];

          $sql = "SELECT `id`, `img`, `label`, `name`, `link`, `date_created` 
                  FROM 
                  `downloads` WHERE id = '$getId'";

          $query = $conn->query($sql);
          if ($query->num_rows > 0) {
              while ($row = $query->fetch_assoc()) {?>
                  <center>
                  <img src="<?php echo $row["img"]?>" alt="img" width="200px"><br><br>
                  <span class="tags"><?php echo $row["label"]?></span><br><br>
                  <span class="title"><?php echo $row["name"]?></span><br><br>
                  <a href="<?php echo $row["link"]?>" class="btn-success"><i class="fas fa-cloud-download-alt"></i> Download</a>
                  </center>
              <?php 
              }
            }?>
        </div>
</body>
</html>