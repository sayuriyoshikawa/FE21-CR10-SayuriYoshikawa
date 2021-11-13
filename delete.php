<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM book WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $title = $data["title"];
        $ISBNcode = $data["ISBNcode"];
        $type = $data["type"];
        $author_first_name = $data["author_first_name"];
        $author_last_name = $data["author_last_name"];
        $publisher_name = $data["publisher_name"];
        $publisher_address = $data["publisher_address"];
        $publish_date = date("Y-m-d", strtotime($data['publish_date']));
        $short_description = $data["short_description"];
        $status = $data["status"];
        $picture = $data["picture"];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete media</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
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

        fieldset {
            margin: auto;
            width: 50%;
            min-width: 300px;
            text-align: center;
        }

        .h2 {
            text-align: center;
        }

        table {
            width: 30%;
            min-width: 300px;
            overflow: scroll;
        }

        td {
            font-size: 20px;
        }

        .delete {
            background-color: #BE0000;
            color: white;
        }

        .image img {
            width: 30vw;
            min-width: 250px;
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
    <fieldset class="mb-5">
        <legend class='h2 mb-5 mt-5'> Delete request </legend>
        <h3>You have selected the data below:</h3>
        <div class="image mt-5">
            <center><img class="mediaImage" src='pictures/<?php echo $picture ?>' alt="<?php echo $title ?>"> </center>
        </div>
        <table class="table">
            <tr>
                <td>title: <?php echo  $title ?></td>
            </tr>
            <tr>
                <td>Author: <?php echo  $author_first_name . " " . $author_last_name ?></td>
            </tr>

        </table>

        <h3 class="mb-4">Do you really want to delete this product? </h3>
        <form action="actions/a_delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="hidden" name="picture" value="<?php echo $picture ?>" />
            <button class="btn delete" type="submit"> Yes, delete it! </button>
            <a href="index.php"><button class="btn btn-warning" type="button"> No, go back! </button></a>
        </form>
    </fieldset>
</body>

</html>