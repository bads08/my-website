<?php
 require_once "../config/conn.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../dist/css/mystyle.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
       <div class="banner">
        <a href="../home.php"><img src="../dist\img\banner.png" alt="" width="100%"></a>
       </div>
    </div>
    <nav>
        <div class="container">
          <ul class="nav">
              <li><a href="index.php">Dashboard</a></li>
              <li><a href="create.php">Create</a></li>
              <li><a href="../home.php">Go to Website</a></li>
          </ul>
        </div>
   </nav>
        <div class="container"> 
        <br>
        <p id="alert"></p>
         <form id="formCreate">
         <label for="">Thumbnail link</label><br>
          <input type="text" name="img">
          <br>
          <br>
         <label for="">Select Tag</label><br>
          <select name="tag" id="tag">
              <option value="Tarpauline">Tarpauline</option>
              <option value="Business">Business</option>
          </select>
          <br>
          <br>
          <label for="">Name</label><br>
          <input type="text" name="name">
          <br>
          <br>
          <label for="">Download link</label><br>
          <input type="text" name="link">
          <br>
          <br>
          <button class="btn-default" id="btn-create">Submit</button>
         </form>
        </div>
<script src="../jquery/jquery.min.js"></script>
<script>
  $(document).ready(function () {
      $("#btn-create").on("click", function (e) {
          e.preventDefault();
          $.ajax({
              url: "function/create.php",
              type: "POST",
              data: $("#formCreate").serialize(),
              cache: false,
              beforeSend: function () {
                $("#btn-create").html("Submitting...");
              },
              success: function (response) {
                  if (response == "success") {
                      $("#alert").append("<b style='color: green;'>New data inserted.</b>");
                      $("#btn-create").html("Submit");
                      $("#formCreate")[0].reset();
                      setTimeout(() => {
                        location.reload();
                      }, 2000);
                  }
                  if(response == "empty"){
                    $("#alert").append("<b style='color: red;'>Empty Fields.</b>");
                    $("#btn-create").html("Submit");
                    setTimeout(() => {
                        location.reload();
                      }, 2000);
                  }
              }
          })
      })
  })
</script>
</body>
</html>