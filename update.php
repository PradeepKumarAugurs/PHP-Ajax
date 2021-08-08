<?php
//update.php

include('database_connection.php');

if(isset($_POST["id"]))
{
    extract($_POST);
    $query = "UPDATE `users` SET `name`='$name',`email`='$email',`mobile`='$mobile',`gender`='$gender',
    `qualification`='$qualification',`state`='$state',`city`='$city' WHERE id='$id' ";

    $statement = $connect->prepare($query);
    $statement->execute();
}


?>
