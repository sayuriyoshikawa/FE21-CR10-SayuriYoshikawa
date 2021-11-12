<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once  'components/boot.php' ?>
    <title>Insert media</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Insert media</legend>
        <form action="actions/a_insert.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Title</th>
                    <td><input class='form-control' type="text" name="title" placeholder="Title" /></td>
                </tr>
                <tr>
                    <th>ISBN code</th>
                    <td><input class='form-control' type="text" name="ISBNcode" placeholder="ISBN code" /></td>
                </tr>
                <tr>
                    <div class="form-check form-check-inline">
                        <th>Type</th>
                        <td>
                            <input class="form-check-input" type="radio" name="type" value="Book">
                            <label class="form-check-label" for="inlineRadio1">Book</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="CD">
                        <label class="form-check-label" for="inlineRadio2">CD</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="DVD">
                        <label class="form-check-label" for="inlineRadio2">DVD</label>
                    </div>
                    </td>
                    </div>
                </tr>
                <tr>
                    <th>Author name</th>
                    <td><input type="text" class="form-control" type="text" name="author_first_name" placeholder="First name" aria-label="First name"></td>
                </tr>
                <tr>
                    </th>
                    <th>
                    <td><input type="text" class="form-control" type="text" name="author_last_name" placeholder="Last name" aria-label="Last name"></td>

                </tr>
                <tr>
                    <th>Publiser name</th>
                    <td><input class='form-control' type="text" name="publisher_name" placeholder="publisher" /></td>
                </tr>
                <tr>
                    <th>publisher Adress</th>
                    <td><input class='form-control' type="text" name="publisher_address" placeholder="Publiser adress" /></td>
                </tr>
                <tr>
                    <th>publish Date</th>
                    <td><input class='form-control' type="date" name="publish_date" placeholder="Publish date" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea class="form-control" type="text" name="short_description" placeholder="Description" rows="3"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Picture </th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <div class="form-check form-check-inline">
                        <th>Status</th>
                        <td>
                            <input class="form-check-input" type="radio" name="status" value="available">
                            <label class="form-check-label" for="inlineRadio1">Available</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="reserved">
                        <label class="form-check-label" for="inlineRadio2">Reserved</label>
                    </div>
                    </td>
                    </div>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit"> Insert Product </button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button"> Home </button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>