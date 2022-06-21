<?php
//subject_number study_name visit_date visit_type visit_number next_visit missed_visit reason
$connect = mysqli_connect("localhost", "root", "", "usamru");
if(isset($_POST["subject_number"], $_POST["study_name"], $_POST["visit_date"], $_POST["visit_type"], $_POST["visit_number"], $_POST["next_visit"]
, $_POST["missed_visit"], $_POST["reason"]))
{
 $subject_number = mysqli_real_escape_string($connect, $_POST["subject_number"]);
 $study_name = mysqli_real_escape_string($connect, $_POST["study_name"]);
 $visit_date = mysqli_real_escape_string($connect, $_POST["visit_date"]);
 $visit_type = mysqli_real_escape_string($connect, $_POST["visit_type"]);
 $visit_number = mysqli_real_escape_string($connect, $_POST["visit_number"]);
 $next_visit = mysqli_real_escape_string($connect, $_POST["next_visit"]);
 $missed_visit = mysqli_real_escape_string($connect, $_POST["missed_visit"]);
 $reason = mysqli_real_escape_string($connect, $_POST["reason"]);
 $query = "INSERT INTO visits(subject_number,study_name,visit_date,visit_type,visit_number,next_visit,missed_visit,reason) 
 VALUES('$subject_number', '$study_name' '$visit_date','$visit_type', '$visit_number' '$next_visit','$missed_visit', '$reason')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Added Successfully';
 }
}
?>