<?php
require_once "db_connect.php";
require_once "file_upload.php";

if ($_POST) {
    $title = $_POST["title"];
    $ISBNcode = $_POST["ISBNcode"];
    $type = $_POST["type"];
    $author_first_name = $_POST["author_first_name"];
    $author_last_name = $_POST["author_last_name"];
    $publisher_name = $_POST["publisher_name"];
    $publisher_address = $_POST["publisher_address"];
    $publish_date = date("Y-m-d", strtotime($_POST['publish_date']));
    $short_description = $_POST["short_description"];
    $status = $_POST["status"];
    $uploadError = '';
    $picture = file_upload($_FILES['picture']);



    $sql = "INSERT INTO book (title, ISBNcode, type, author_first_name, author_last_name, publisher_name, publisher_address, publish_date, short_description, status, picture) VALUES ('$title', '$ISBNcode', '$type', '$author_first_name', '$author_last_name', '$publisher_name', '$publisher_address', '$publish_date', '$short_description', '$status', '$picture->fileName')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The media below was successfully created
        <br>

        <table class='table'>
            <tr>
            <th scope='row'>Title</th>
             <td>$title</td>
            </tr>
            <th scope='row'>ISBN code</th>
             <td>$ISBNcode</td>
            </tr>
            <th scope='row'>Type</th>
             <td>$type</td>
            </tr>
            <th scope='row'>Author firstname</th>
             <td>$author_first_name</td>
            </tr>
            <th scope='row'>Author lastname</th>
             <td>$author_last_name</td>
            </tr>
            <th scope='row'>Publisher name</th>
             <td>$publisher_name</td>
            </tr>
            <th scope='row'>Publisher  address</th>
             <td>$publisher_address</td>
            </tr>
            <th scope='row'>Publish date</th>
             <td>$publish_date</td>
            </tr>
            <th scope='row'>Description</th>
             <td>$short_description</td>
            </tr>
            <th scope='row'>Status</th>
             <td>$status</td>
            </tr>
            </tr></table><hr>";
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <?php require_once '../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>

</body>

</html>