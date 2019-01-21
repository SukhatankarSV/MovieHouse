<?php 
$data = json_decode(file_get_contents("php://input"));

$fid = $data->film_id;
$fname = $data->film_name;
$fgenre = $data->film_genre;
$fstudio = $data->film_studio;
$fdirect = $data->film_director;
$fprod = $data->film_producer;
$flead = $data->film_lead;


$conn = new mysqli("localhost", "root", "", "mydatabase");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$ret = mysqli_query($conn, "INSERT INTO movies(film_id, film_name, film_genre, film_studio, film_director, film_producer, film_lead) VALUES ($fid, '$fname', '$fgenre', '$fstudio', '$fdirect', '$fprod', '$flead');");
 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if($ret === TRUE)
    echo json_encode("200 A-OK");
else
    echo json_encode("Failed.");
?>