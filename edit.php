<?php
    include ('connect.php');
    $id = $_GET["id"];
    $init = $conn->query("SELECT * FROM Users Where id = $id");
    $row = $init->fetch_assoc();
    if (isset($_POST["submit"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $nickname = $_POST["nickname"];
        $email = $_POST["email"];
        $stdid = $_POST["stdid"];
        $stmt = $conn->prepare("UPDATE Users SET firstname= ?, lastname =?, nickname =?, email = ?, student_id=? WHERE id = $id");
        $stmt->bind_param("sssss", $firstname, $lastname,$nickname, $email, $stdid);
        $stmt->execute();
        if($stmt){
            echo '<script>alert("Add Complete!!!");</script>';
            header("Location: index.php");
        }
        else{
            echo '<script>alert("Error");</script>';
        }   
    }

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
            <a class="item" href="index.php">Home</a>
            <a class="item active" href="#">Add New User</a>
        </div>

        <form action="" method="post">
            <div class="ui form">
                <div class="fields">
                    <div class="eight wide field">
                        <label>Firstname <span style="color: red;">*</span></label>
                        <input type="text" name="firstname" placeholder="First Name" value="<?= $row['firstname']; ?>"> required>
                    </div>
                    <div class="eight wide field">
                        <label>Lastname <span style="color: red;">*</span></label>
                        <input type="text" name="lastname" placeholder="Last Name" value="<?= $row['lastname']; ?>"  required>
                    </div>
                    <div class="eight wide field">
                        <label>Nickname <span style="color: red;">*</span></label>
                        <input type="text" name="nickname" placeholder="Nick Name" value="<?= $row['nickname']; ?>" required>
                    </div>
                </div>
                <div class="field">
                    <label>Email <span style="color: red;">*</span></label>
                    <input type="email" name="email" placeholder="example : abc@pqr.com" value="<?= $row['email']; ?>" required>
                </div>
                <div class="inline field">
                    <label>Student ID <span style="color: red;">*</span></label>
                    <input type="text" name="stdid" placeholder="5910XXXXXX" value="<?= $row['student_id']; ?>" required>
                </div>
                <input type="submit" name="submit" class="ui submit button" value="submit" required>
            </div>
        </form>
    
</body>
</html>