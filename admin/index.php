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
        <a href="home.php"><img src="../dist\img\banner.png" alt="" width="100%"></a>
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
          <table>
              <tbody>
                  <tr>
                    <td>Downloads</td>
                  </tr>
              </tbody>
              <tbody>
                <?php
                 if (isset($_GET["page"])) {
                   $page = $_GET["page"];
                 }else {
                   $page = 1;
                 }

                 $number_per_page = 10;
                 $start_from      = ($page-1)* $number_per_page;
                 $sql = "SELECT * FROM downloads LIMIT $start_from, $number_per_page";
                 $query = $conn->query($sql);
                 if ($query->num_rows > 0) {
                   while ($row = $query->fetch_assoc()) {?>
                   <tr>
                      <td>
                        <a href="view.php?view=<?php echo $row["id"]?>" target="blank"><span class="tags"><?php echo $row["name"]?></span> <?php echo $row["name"]?></a>
                      </td>
                   </tr>
                  <?php }}?>
                  
              </tbody>
          </table>
          <br>
          <center>
          <?php
            $sql = "SELECT * FROM downloads";
            $query = $conn->query($sql);
            $total_record = $query->num_rows;
            $total_page = ceil($total_record/$number_per_page);

            if ($page > 1) {
              echo "<a href='index.php?page=".($page-1)."' class='btn-page-2 btn-hover'>Prev</a>";
             }

            for ($i=1; $i < $total_page; $i++) {
              echo "<a href='index.php?page=".$i."' class='btn-page btn-hover'>".$i."</a>";
            }

            if ($i > $page) {
              echo "<a href='index.php?page=".($page+1)."' class='btn-page-2 btn-hover'>Next</a>";
             }
            ?>
          </center>
        </div>
</body>
</html>