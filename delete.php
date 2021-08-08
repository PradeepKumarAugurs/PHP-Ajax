<?php
//delete.php

include('database_connection.php');

if(isset($_POST["id"]))
{
$file_path = 'files/' . $_POST["image_name"];
if(unlink($file_path))
{
$query = "DELETE FROM users WHERE id = '".$_POST["id"]."'";
$statement = $connect->prepare($query);
$statement->execute();
}
}

?>