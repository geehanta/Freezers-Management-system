<?php
$connect = mysqli_connect("localhost", "root", "", "freezers");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM samples WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted!';
 }
}
?>