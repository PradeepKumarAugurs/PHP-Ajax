<?php
//edit.php
include('database_connection.php');

$query = "
SELECT * FROM users 
WHERE id = '".$_POST["id"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
$file_array = explode(".", $row["image"]);
$output['id'] = $row["id"];
$output['name'] = $row["name"];
$output['email'] = $row["email"];
$output['mobile'] = $row["mobile"];
$output['gender'] = $row["gender"];
$output['qualification'] = explode(',',$row["qualification"]);
$output['image'] = $file_array[0];
$output['state'] = $row["state"];
$output['city'] = $row["city"];
}

echo json_encode($output);

?>