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
    <title>Detail information</title>
    <?php require_once  'components/boot.php'?>
    <style  type= "text/css">
           fieldset  {
               margin: auto;
               margin-top : 3vw;
               width: 60%  ;
           }  
           .mediaImage{
               width: 50vw;
           }    
        </style>
</head>
<body>
<fieldset>
           <legend  class='h2'>Detail imformation</legend>
           <img class="mediaImage"  src='pictures/<?php echo $picture ?>' alt= "<?php echo $title ?>">

           <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Title</th>
                    <td><?php echo $title ?></td>
                </tr>
                <tr>
                    <th>ISBN code</th>
                    <td><?php echo $ISBNcode ?></td>
                </tr>
                
                <tr>
                    <div class="form-check form-check-inline">
                        <th>Type</th>
                        <td><?php echo $type ?></td>
                    </div>
                </tr>
                <tr>
                    <th>Author name</th>
                    <td><?php echo $author_first_name." ".$author_last_name ?></td>
                </tr>
                <tr>
                    <th>Publiser name</th>
                    <td><?php echo $publisher_name ?></td>
                </tr>
                <tr>
                    <th>publisher Adress</th>
                    <td><?php echo $publisher_address ?></td>
                </tr>
                <tr>
                    <th>publish Date</th>
                    <td><?php echo $publish_date ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo $short_description ?>
                    </td>
                </tr>
                <tr>
                <th>Status</th>
                    <td><?php echo $status ?>
                    </td>
                </tr>
                <tr>
                        <input   type = "hidden"   name = "id"   value = "<?php echo $data['id'] ?>" />
                        <input type = "hidden" name= "picture" value = "<?php echo $data['picture'] ?>" />
                    </tr>
               </table>
               <a href= "index.php"><button class="btn btn-warning" type ="button">Back</button></a>
           </form>
       </fieldset>
    
</body>
</html>