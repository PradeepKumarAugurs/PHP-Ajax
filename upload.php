<?php
//upload.php
include('database_connection.php');



if(count($_FILES["file"]["name"]) > 0)
{
    extract($_POST);
    sleep(3);
    $file_name = '';
    for($count=0; $count<count($_FILES["file"]["name"]); $count++)
    {
        $file_name = $_FILES["file"]["name"][$count];
        $tmp_name = $_FILES["file"]['tmp_name'][$count];
        $file_array = explode(".", $file_name);
        $file_extension = end($file_array);
        if(file_already_uploaded($file_name, $connect))
        {
            $file_name = $file_array[0] . '-'. rand() . '.' . $file_extension;
        }
        $location = 'files/' . $file_name;
        if(move_uploaded_file($tmp_name, $location))
        {
            $file_name = $file_name;
        }
    }
    $query = "INSERT INTO `users` (`name`, `email`, `mobile`, `gender`, `qualification`, `image`, `state`, `city`) 
    VALUES ('$name', '$email', '$mobile', '$gender', '$qualification', '$file_name', '$state', '$city')";
    $statement = $connect->prepare($query);
    $statement->execute();
}

function file_already_uploaded($file_name, $connect)
{

$query = "SELECT * FROM tbl_image WHERE image_name = '".$file_name."'";
$statement = $connect->prepare($query);
$statement->execute();
$number_of_rows = $statement->rowCount();
if($number_of_rows > 0)
{
return true;
}
else
{
return false;
}
}

?>
