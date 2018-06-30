<?php
$regid=$_REQUEST["regid"];
$fullname=$_REQUEST["fullname"];
$emailid=$_REQUEST["emailid"];
$phone=$_REQUEST["phone"];
$wnumber=$_REQUEST["wnumber"];
foreach($_REQUEST["year"] as $year)
{}
foreach($_REQUEST["branch"] as $branch)
{}
foreach($_REQUEST["team"] as $team)
{}
foreach($_REQUEST["tshirt"] as $tshirt)
{}
foreach($_REQUEST["lower"] as $lower)
{}
if(isset($_REQUEST["batsman"]))
{
$batsman=$_REQUEST["batsman"];
}
else
{
$batsman="No";
}
if(isset($_REQUEST["bowler"]))
{
$bowler=$_REQUEST["bowler"];
}
else
{
$bowler="No";
}
if(isset($_REQUEST["wicketk"]))
{
$wicketk=$_REQUEST["wicketk"];
}
else
{
$wicketk="No";
}
if(isset($_REQUEST["captain"]))
{
$captain=$_REQUEST["captain"];
}
else
{
$captain="No";
}
if(isset($_REQUEST["allrounder"]))
{
$allrounder=$_REQUEST["allrounder"];
}
else
{
$allrounder="No";
}


// image Uploading starts
$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
$upload_exts = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($upload_exts, $file_exts))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
}
else
{
echo "Upload: " . $_FILES["file"]["name"] . "<br>";
echo "Type: " . $_FILES["file"]["type"] . "<br>";
echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
// Enter your path to upload file here
if (file_exists("C:/xampp\htdocs\gpl-main1/img/" .
$_FILES["file"]["name"]))
{
echo "<div class='error'>"."(".$_FILES["file"]["name"].")".
" already exists. "."</div>";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"C:/xampp\htdocs\gpl-main1/img/" . $_FILES["file"]["name"]);
echo "<div class='sucess'>"."Stored in: " .
"C:/xampp\htdocs\gpl-main1/img/" . $_FILES["file"]["name"]."</div>";
}
}
}
else
{
echo "<div class='error'>Invalid file</div>";
}

$image=$_FILES["file"]["name"];
//image uploading finishes...



$connection=mysql_connect("localhost","root","") or die ("server failed");
$db=mysql_select_db("GPL",$connection) or die("database failed".mysql_error());


$query="INSERT INTO  $team VALUES('$regid','$fullname','$emailid','$phone','$wnumber','$branch','$year','$team','$tshirt','$lower','$allrounder','$batsman','$bowler','$wicketk','$captain','$image')";
 $result=mysql_query($query) or die ("query failed:".mysql_error());  

mysql_close($connection);

header('Location:   ');

?>