<?php
require_once 'actions/db_connect.php';
$sql = "SELECT publishername FROM book";
$a = mysqli_query($connect, $sql);

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM book WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
     
        $publisher_name = $data["publisher_name"];
       
    } else {
        header("location: error.php");
    }
 
} else {
    header("location: error.php");
}




$sql2 = "SELECT * FROM book";
$result2 = mysqli_query($connect, $sql2);
$tbody = '';
if (mysqli_num_rows($result2)  > 0) {
    while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        if ($publisher_name == $row['publisher_name'])
            $tbody .= "<tr>
 
             <td><img class='img-thumbnail' src='pictures/" . $row['picture'] . "'> </td>
            <td>" . $row['ISBNcode'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . $row['author_first_name'] . " " . $row['author_last_name'] . "</td>
            <td>" . $row['type'] . "</td>
            <td>" . $row['publisher_name'] . "</td>
            <td>" . $row['publish_date'] . "</td>
            
             </tr>";
    };
} else {
    $tbody =   "<tr><td colspan='8'><center>No Data Available </center></td></tr>";
}
mysqli_close($connect);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot.php' ?>
    <title>Document</title>

    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 60px !important;
            height: 70px !important;
        }
        .home {
            background-color:#00909E;
            color: white;
        }

        td {
            text-align: center;
            vertical-align: middle;
        }
        .h2 {
            text-align: center;
        }
        tr {
            text-align: center;
        }
        .back {
               background-color: #27496D;
               color: white;
           }
    </style>
</head>

<body>
    <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>

            <a href="index.php"><button class='btn home' type="button">Home</button></a>
            <a href="index.php"><button class="btn back" type="button">Back</button></a>
        </div>

        <p class='h2 mb-5'>Media list published by :<br> <?php echo $publisher_name ?></p>

        <table class='table table-striped table-bordered'>
            <thead class='table-primary'>
                <tr>

                    <th>Picture</th>
                    <th>ISBN code</th>
                    <th>title</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Publisher</th>
                    <th>Publish date</th>

                </tr>
            </thead>
            <tbody>
              
                <?php echo $tbody ?>
            </tbody>
        </table>
    </div>


</body>

</html>