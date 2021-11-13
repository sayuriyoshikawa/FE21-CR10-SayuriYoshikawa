<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once  'components/boot.php' ?>
    <title>Insert media</title>
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
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
        .h2 {
            text-align: center;
        }
        .insert {
               background-color: #00909E;
               color: white;
           }
           .home {
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
    <fieldset>
        <legend class='h2'>Insert media</legend>
        <form action="actions/a_insert.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Title</th>
                    <td><input id="validationDefault01" class='form-control' type="text" name="title" placeholder="Title" required /></td>
                </tr>
                <tr>
                    <th>ISBN code</th>
                    <td><input id="validationDefault01" class='form-control' type="text" name="ISBNcode" placeholder="ISBN code" required/></td>
                </tr>
                <tr>
                    <div class="form-check form-check-inline">
                        <th>Type</th>
                        <td>
                            <input id="validationDefault01" class="form-check-input" type="radio" name="type" value="Book" required>
                            <label class="form-check-label" for="inlineRadio1">Book</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="validationDefault01" class="form-check-input" type="radio" name="type" value="CD">
                        <label class="form-check-label" for="inlineRadio2" required>CD</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="validationDefault01" class="form-check-input" type="radio" name="type" value="DVD">
                        <label class="form-check-label" for="inlineRadio2" required>DVD</label>
                    </div>
                    </td>
                    </div>
                </tr>
                <tr>
                    <th>Author name</th>
                    <td><input id="validationDefault01" type="text" class="form-control" type="text" name="author_first_name" placeholder="First name" aria-label="First name" required></td>
                </tr>
                <tr>
                    </th>
                    <th>
                    <td><input id="validationDefault01" type="text" class="form-control" type="text" name="author_last_name" placeholder="Last name" aria-label="Last name" required></td>

                </tr>
                <tr>
                    <th>Publiser name</th>
                    <td><input id="validationDefault01" class='form-control' type="text" name="publisher_name" placeholder="publisher" required/></td>
                </tr>
                <tr>
                    <th>publisher Adress</th>
                    <td><input id="validationDefault01" class='form-control' type="text" name="publisher_address" placeholder="Publiser adress" required/></td>
                </tr>
                <tr>
                    <th>publish Date</th>
                    <td><input id="validationDefault01" class='form-control' type="date" name="publish_date" placeholder="Publish date" required/></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea class="form-control" type="text" name="short_description" placeholder="Description" rows="3" required></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Picture </th>
                    <td><input id="validationDefault01" class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <div class="form-check form-check-inline">
                        <th>Status</th>
                        <td>
                            <input id="validationDefault01" class="form-check-input" type="radio" name="status" value="available" required>
                            <label class="form-check-label" for="inlineRadio1">Available</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="validationDefault01" class="form-check-input" type="radio" name="status" value="reserved" required>
                        <label class="form-check-label" for="inlineRadio2">Reserved</label>
                    </div>
                    </td>
                    </div>
                </tr>
            
            </table>
            <div class="mt-3 ">
    
    <center><button class='btn insert mb-4' type="submit"> Insert media </button><center>
    <a href="index.php"><button class='btn home mb-5' type="button"> Home </button></a>
</div>
        </form>
       
    </fieldset>
</body>

</html>