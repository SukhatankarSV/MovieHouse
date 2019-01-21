<?php 
$data = json_decode(file_get_contents("php://input"));

$fid = $data->film_id;
$fname = $data->film_name;
$fgenre = $data->film_genre;
$fstudio = $data->film_studio;
$fdirect = $data->film_director;
$fprod = $data->film_producer;
$flead = $data->film_lead;



/*$myfile = fopen("datau.txt", "w") or die("Unable to open file!");
fwrite($myfile, $fid);
fwrite($myfile, $fname);
fwrite($myfile, $fgenre);
fwrite($myfile, $studio);
fwrite($myfile, $fprod);
fwrite($myfile, $flead);

fclose($myfile);
*/
$conn = new mysqli("localhost", "root", "", "mydatabase");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$ret = mysqli_query($conn, "UPDATE movies SET film_name='$fname',film_genre='$fgenre',film_studio='$fstudio',film_director='$fdirect',film_producer='$fprod',film_lead='$flead' where film_id=$fid;");


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if($ret===TRUE)
    echo json_encode("200 A-OK");
else
    echo json_encode("Failed.");
?>