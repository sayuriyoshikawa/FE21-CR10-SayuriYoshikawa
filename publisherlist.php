<?php
require_once 'actions/db_connect.php';
$sql = "SELECT * FROM book";
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "
        <a href='belonglist.php?id=" . $row['id'] . "' class='list-group-item list-group-item-action'>". $row['publisher_name']
."</a>";



    };
} else {
    $tbody =   "
    
    <li class='list-group-item'><center>No Data Available </center></li>";
}

mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "components/boot.php" ?>
    <title>Publisher list</title>

    <style>
         .navbar-brand {
            color: white;
            font-size: 3vw;
        }

        .navbar {
            position: sticky;
            top: 0;
            background-color: #27496D;
            text-align: center;
            width: 100%;
        }
        .list {
            width: 60%;
            min-width: 300px;
            margin: auto;
        }
        .list h1 {
            text-align: center;
        }
        .back {
               background-color: #27496D;
               color: white;
           }

    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">Library stock system</a>
            
        </div>
        </div>
    </nav>
    <div class="list">
    <h1 class="m-5">Publisher list</h1>
    <ul class="list-group list-group-flush ">
        <?= $tbody; ?>
    </ul>
    <a href="index.php"><button class="btn back mt-4" type="button">Back</button></a>
    </div>

</body>

</html>