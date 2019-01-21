<?php 
$data = json_decode(file_get_contents("php://input"));

$fid = $data->film_id;

$myfile = fopen("datad.txt", "w") or die("Unable to open file!");
fwrite($myfile, $fid);
fclose($myfile);

$conn = new mysqli("localhost", "root", "", "mydatabase");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$ret = mysqli_query($conn, "SELECT * FROM movies where film_id = $fid;");
if($ret)
{
    while($r = mysqli_fetch_assoc($ret)) {
        $rows[] = $r;
    }
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');


echo json_encode($rows);

/*echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result))
{   //Creates a loop to loop through results
    echo "<tr><td>" . $row['film_id'] . "</td><td>" . $row['film_name'] . "<tr><td>" . $row['film_genre'] ."<tr><td>" . $row['film_studio'] ."<tr><td>" . $row['film_director'] ."<tr><td>" . $row['film_producer'] ."<tr><td>" . $row['film_lead'] ;  //$row['index'] the index here is a field name
}

echo "</table>";
 */

/*if($ret === TRUE)
    echo json_encode("200 A-OK");
else
    echo json_encode("Failed.");*/
?>