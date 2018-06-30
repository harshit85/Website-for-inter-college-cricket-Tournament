  <?php

$reg=$_REQUEST["reg"];
$connection=mysql_connect("localhost","root","") or die("couldn't connect to server");
$db=mysql_select_db("gpl",$connection) or die("couldnt select database");
$query="SELECT * FROM team1 WHERE regid='$reg' ";
$result=mysql_query($query) or die("query failed:".mysql_error());
while($row=mysql_fetch_array($result))
{
  
echo "        
           <div class=".'"'."row".'"'.">
             
			  <h2 style=".'"'."text-align:center".'"'."><b>Player&nbsp&nbspProfile</b></h2>
			 <div class=".'"'."hidden-xs hidden-sm col-md-1".'"'.">
                
             </div>
			
            <div style=".'"'."border:".'"'."class=".'"'."col-md-6 col-sm-12".'"'.">
                <img class=".'"'."img-responsive".'"'."src=".'"'."img/".$row['image'].'"'.">
            </div>

            <div style=".'"'."text-align:center".'"'."class=".'"'."col-md-4 col-sm-12".'"'.">
                <h3>",$row['fullname'],"</h3>
                <p><b>",$row['year'],"&nbsp&nbsp&nbsp",$row['branch'],"</b><p>
                <p><b>",$row['batsman'],"&nbsp&nbspBatsman</b></p>
				<p><b>",$row['bowler'],"&nbsp&nbspBowler</b></p>";
				if($row['wicketk']=="yes")
				{
				echo "<p><b>Wicketkeeper</b></p>";
				};
				
				if($row['allrounder']=="yes")
				{
				echo "<p><b>Allrounder</b></p>";
				};
				
				if($row['captain']=="yes")
				{
				echo "<p><b>Captain of&nbsp&nbsp".$row['team']."</b></p>";
				};
				
				
             echo    " <p><b>Mobile Number:</b>&nbsp",$row['phone'],"</p>
				<p><b>Id:</b>&nbsp",$row['emailid'],"</p>
            </div>
			<div class=".'"'."hidden-xs hidden-sm col-md-1".'"'.">
                
             </div>

             </div>";

}

mysql_close($connection);
?>