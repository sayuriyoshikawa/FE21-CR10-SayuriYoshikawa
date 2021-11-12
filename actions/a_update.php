<?php
require_once 'db_connect.php';
require_once  'file_upload.php';

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
   $id = $_POST['id'];
   $uploadError = '';
   $picture = file_upload($_FILES['picture']);

   if($picture->error===0){
       ($_POST["picture" ]=="noImg.png")?: unlink("../pictures/$_POST[picture]");          
       $sql = "UPDATE book SET title = '$title', ISBNcode = '$ISBNcode', type = '$type',author_first_name = '$author_first_name',author_last_name = '$author_last_name',publisher_name = '$publisher_name',publisher_address = '$publisher_address',
    publish_date = '$publish_date',short_description = '$short_description', status = '$status',  picture = '$picture->fileName' WHERE id = {$id}";
   }else{
    $sql = "UPDATE book SET title = '$title', ISBNcode = '$ISBNcode', type = '$type',author_first_name = '$author_first_name',author_last_name = '$author_last_name',publisher_name = '$publisher_name',publisher_address = '$publisher_address',
    publish_date = '$publish_date',short_description = '$short_description', status = '$status' WHERE id = {$id}";
   }    
   if (mysqli_query($connect, $sql) === TRUE) {
       $class = "success";
       $message = "The record was successfully updated" ;
       $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'' ;
   } else {
       $class = "danger";
       $message = "Error while updating record : <br>" . mysqli_connect_error();
       $uploadError = ($picture->error != 0)? $picture->ErrorMessage :'';
   }
   mysqli_close($connect);    
} else {
   header("location: ../error.php");
}
?>


<!DOCTYPE html>
<html lang= "en">
   <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/boot.php'?> 
    </head>
   <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
           </div>
            <div class="alert alert-<?php echo $class;?>"  role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>' ><button class="btn btn-warning"  type='button'>Back </button></a>
                <a href='../index.php' ><button class="btn btn-success"  type='button'>Home </button></a>
           </div>
       </div>
   </body>
</html>