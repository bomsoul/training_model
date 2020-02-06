<?php
    include('connect.php');
    $result = $conn->query("SELECT * FROM Users");
    
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
        <div class="ui three item menu">
            <a class="item active" href="#">Home</a>
            <a class="item" href="create.php">Add New User</a>
        </div>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Nickname</th>
                    <th>StudentID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td data-label="Firstname"><?= $row['firstname'];?></td>
                        <td data-label="Lastname"><?= $row['lastname'];?></td>
                        <td data-label="Nickname"><?= $row['nickname'];?></td>
                        <td data-label="StudentID"><?= $row['student_id'];?></td>
                        <td><a class="ui inverted green button" href="show.php?id=<?= $row['id'];?>">Show</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>