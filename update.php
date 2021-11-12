<?php 
require_once "actions/db_connect.php";

if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM book WHERE id = {$id}" ;
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit information</title>
    <?php require_once  'components/boot.php'?>
    <style  type= "text/css">
           fieldset  {
               margin: auto;
               margin-top : 100px;
               width: 60%  ;
           }  
           .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
           }    
        </style>
</head>
<body>
<fieldset>
           <legend  class='h2'>Update request <img class='img-thumbnail rounded-circle'  src='pictures/<?php echo $picture ?>' alt= "<?php echo $title ?>"></legend>

           <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Title</th>
                    <td><input class='form-control' type="text" name="title" placeholder="Title" value= "<?php echo $title ?>" /></td>
                </tr>
                <tr>
                    <th>ISBN code</th>
                    <td><input class='form-control' type="text" name="ISBNcode" placeholder="ISBN code" value= "<?php echo $ISBNcode ?>" /></td>
                </tr>
                
                <tr>
                    <div class="form-check form-check-inline">
                        <th>Type</th>
                        <td>
                            <input class="form-check-input" type="radio" name="type" value="Book" <?php if( $type == "Book") { echo "checked";} ?> >
                            <label class="form-check-label" for="inlineRadio1">Book</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="CD" <?php if( $type == "CD") { echo "checked";} ?>>
                        <label class="form-check-label" for="inlineRadio2">CD</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="DVD" <?php if( $type == "DVD") { echo "checked";} ?>>
                        <label class="form-check-label" for="inlineRadio2">DVD</label>
                    </div>
                    </td>
                    </div>
                </tr>
                <tr>
                    <th>Author name</th>
                    <td><input type="text" class="form-control" type="text" name="author_first_name" placeholder="First name" aria-label="First name" value= "<?php echo $author_first_name ?>" /></td>
                </tr>
                <tr>
                    </th>
                    <th>
                    <td><input type="text" class="form-control" type="text" name="author_last_name" placeholder="Last name" aria-label="Last name" value= "<?php echo $author_last_name ?>" /></td>

                </tr>
                <tr>
                    <th>Publiser name</th>
                    <td><input class='form-control' type="text" name="publisher_name" placeholder="publisher" value= "<?php echo $publisher_name ?>"/></td>
                </tr>
                <tr>
                    <th>publisher Adress</th>
                    <td><input class='form-control' type="text" name="publisher_address" placeholder="Publiser adress" value= "<?php echo $publisher_address ?>"/></td>
                </tr>
                <tr>
                    <th>publish Date</th>
                    <td><input class='form-control' type="date" name="publish_date" placeholder="Publish date" value= "<?php echo $publish_date ?>"/></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea class="form-control" type="text" name="short_description" placeholder="Description" rows="3"><?php echo $short_description ?></textarea>
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
                            <input class="form-check-input" type="radio" name="status" value="available" <?php if( $status == "available") { echo "checked";} ?>>
                            <label class="form-check-label" for="inlineRadio1">Available</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="reserved" <?php if( $status == "reserved") { echo "checked";} ?>>
                        <label class="form-check-label" for="inlineRadio2">Reserved</label>
                    </div>
                    </td>
                    </div>
                </tr>
                <tr>
                        <input   type = "hidden"   name = "id"   value = "<?php echo $data['id'] ?>" />

                        <input type = "hidden" name= "picture" value = "<?php echo $data['picture'] ?>" />
                        <td><button class="btn btn-success"  type= "submit">Save Changes</button ></td>
                       <td><a href= "index.php"><button class="btn btn-warning" type ="button">Back</button></a></td>
                    </tr>
               </table>
           </form>
       </fieldset>
    
</body>
</html>