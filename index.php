<?php
require_once 'actions/db_connect.php';
$sql = "SELECT * FROM book";
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>

            <td><img class='img-thumbnail' src='pictures/" . $row['picture'] . "'> </td>
           <td>" . $row['ISBNcode'] . "</td>
           <td>" . $row['title'] . "</td>
           <td>" . $row['author_first_name'] . " " . $row['author_last_name'] . "</td>
           <td>" . $row['type'] . "</td>
           <td>" . $row['publisher_name'] . "</td>
           <td>" . $row['publish_date'] . "</td>
           <td>
           <a href='show.php?id=" . $row['id'] . "'>
           <button class='btn btn-success btn-sm' type='button'>Show media</button></a>
           <a href='update.php?id=" . $row['id'] . "'>
           <button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
           <a href='delete.php?id="  . $row['id'] . "'>
           <button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: center;
            vertical-align: middle;

        }

        tr {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>

            <a href="insert.php"><button class='btn btn-primary' type="button">Insert media</button></a>
        </div>
        <p class='h2'>Library</p>

        <table class='table table-striped table-bordered'>
            <thead class='table-success'>
                <tr>

                    <th>Picture</th>
                    <th>ISBN code</th>
                    <th>title</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Publisher</th>
                    <th>Publish date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>

            </tbody>
        </table>
    </div>
</body>

</html>