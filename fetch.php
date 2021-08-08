<?php
include('database_connection.php');
$query = "SELECT * FROM users ORDER BY id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
<table class="table table-bordered table-striped">
<tr>
<th>Sr. No</th>
<th>Name</th>
<th>Email</th>
<th>Moile</th>
<th>Gender</th>
<th>Qualification</th>
<th>Image</th>
<th>State</th>
<th>City</th>
<th>Edit</th>
<th>Delete</th>
</tr>
';
if($number_of_rows > 0)
{
$count = 0;
foreach($result as $row)
{
$count ++; 
$output .= '
<tr>
<td>'.$count.'</td>
<td>'.$row["name"].'</td>
<td>'.$row["email"].'</td>
<td>'.$row["mobile"].'</td>
<td>'.$row["gender"].'</td>
<td>'.$row["qualification"].'</td>
<td><img src="files/'.$row["image"].'" class="img-thumbnail" width="100" height="100" /></td>
<td>'.$row["state"].'</td>
<td>'.$row["city"].'</td>
<td><button type="button" class="btn btn-warning btn-xs edit" id="'.$row["id"].'">Edit</button></td>
<td><button type="button" class="btn btn-danger btn-xs delete" id="'.$row["id"].'" data-image_name="'.$row["image"].'">Delete</button></td>
</tr>
';
}
}
else
{
$output .= '
<tr>
<td colspan="6" align="center">No Data Found</td>
</tr>
';
}
$output .= '</table>';
echo $output;
?>
