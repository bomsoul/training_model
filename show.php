<?php
    include ('connect.php');
    $id = $_GET["id"];
    $init = $conn->query("SELECT * FROM Users Where id = $id");
    $row = $init->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Training Model</title>
    <link rel="stylesheet" href="semantic.min.css">
    <script src="semantic.min.js"></script>
</head>
<body>
<div class="ui container">
    <div class="ui divide items">
    <div class="item">
    <div class="content">
      <a class="header"><?= $row['firstname']?> <?= $row['lastname']?></a>
      <div class="meta">
        <span class="cinema">Nickname : <?= $row['nickname']?></span>
      </div>
      <div class="description">
        <p>Email : <?= $row['email']?></p>
      </div>
      <div class="extra">

        <div class="ui right floated success">
          <div class="ui buttons">
            <a class="ui red button" href="edit.php?id=<?= $row['id'];?>">Edit</a>
            <div class="or"></div>
            <a class="ui positive button" href="index.php">Home</a>
        </div>
        </div>
        <div class="ui label"><?= $row['student_id']?></div>
      </div>
    </div>
  </div>
    </div>
</div>
    
</body>
</html>