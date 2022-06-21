<?php
$connect = mysqli_connect("localhost", "root", "", "usamru");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM visits WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted!';
 }
}
?>