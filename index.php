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
           <button class='btn btn-success btn-sm border-0' type='button'>Show media</button></a>
           <a href='update.php?id=" . $row['id'] . "'>
           <button class='btn btn-primary btn-sm border-0' type='button'>Edit</button></a>
           <a href='delete.php?id="  . $row['id'] . "'>
           <button class='btn btn-danger btn-sm border-0' type='button'>Delete</button></a></td>

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

        nav .btn {
            background-color: #F1F6F9;
        }
        .navbar-nav button:hover {
            background-color: #BBBFCA;
        }

        .navbar-collapse {
            justify-content: end;
        }

        .btn {
            border: 1px solid #27496D;
        }

        .manageProduct {
            
            margin: auto;
            margin-top: 5vw;
            width: 85vw;
            min-width: 300px;
            overflow-x: scroll;
        }

        .img-thumbnail {
            width: 60px !important;
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
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.php">Library stock system</a>
        
            <div  id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="insert.php"><button class='btn' type="button">Insert media</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="publisherlist.php"><button class='btn' type="button">Publisher list</button></a>
                    </li>
            </div>
        </div>
        </div>
    </nav>




    <div class="manageProduct">


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